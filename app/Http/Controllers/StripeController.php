<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderEmail;
use App\http\Controllers\AddressController;
use App\Models\Order;
use App\Models\User;
use App\repositories\interfaces\OrderRepositoryInterface;
use App\repositories\interfaces\UserRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;

class StripeController extends Controller
{
    
    private $orderRepository;
    private $userRepository;
    private $addresseController;
    public function __construct(OrderRepositoryInterface $orderRepository,AddressController $addresseController, UserRepositoryInterface $userRepository)
    {
       $this->userRepository = $userRepository;
       $this->orderRepository =$orderRepository;
       $this->addresseController = $addresseController;
    }

    public function Checkout(Request $request)
    {
        try{// dd($request);
        $order=$this->orderRepository->getOneOrder($request['id']);
        
        return view('client.partials.checkout',compact('order'));
        }catch(Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }




    public function session(Request $request)
    {
        
        try{
            $id=Auth::id();
            $user=$this->userRepository-> getOneUser($id);
            $order =$this->orderRepository->getOneOrder($request['order_id']);
           if($request['city']){
            
            $data = $request->validate([
                'country'=>'required|string',
                'city'=>'required|string',
                'Region'=>'required|string',
                'streetAddress'=>'required|string',
                'zipCode'=>'required|string',
            ]);


               $address = $this->addresseController->store($data);  
               $order->address_id = $address->id; 
               $user->addresses()->attach($address);
               $order->save();
               $this->userRepository->saveUser($user);
            }else{
                $order->address_id = $request['address_id']; 
                $user->addresses()->attach($request['address_id']);
                $order->save();
                $this->userRepository->saveUser($user);   
            }
        
        if($order->order_products == null){
            return back()->with('error', "can't checkout an empty order");
        }
        
        
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $lineItems = [];
        foreach ($order->order_products as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'USD',
                    'product_data' => [
                        'name' => $item->name, 
                    ],
                    'unit_amount' => (int)(($item->priceAtMoment+$item->priceAtMoment* 0.1) * 100) , 
                ],
                'quantity' => $item->quantity,
            ];
        }
         
        $session = \Stripe\Checkout\Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success',['id'=>$order->id]),
            'cancel_url' => route('Checkout'),
        ]);
        return redirect($session->url);
    }catch(Exception $e){
    return back()->with('error',$e->getMessage());
    }
    }

    public function success(Request $request)
    {

        $order=$this->orderRepository->getOneOrder($request['id']);
        
        return view('client.partials.checkout',compact('order'));
        $order->status='payed';
        $this->orderRepository->saveOrder($order);
        Mail::to('sousouja07@gmail.com')->send(new OrderEmail($order));
        return redirect('/')->with("succes", "Thanks for you order, You have just completed your payment. you'll find a confirmation email in your boite mail");
    }
}