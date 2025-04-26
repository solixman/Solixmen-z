<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderEmail;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function Checkout(Request $request)
    {
        $order=Order::find($request['id']);

        return view('client.partials.checkout',compact('order'));
    }

    public function session(Request $request)
    {
        
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $order = Order::with('order_products')->findOrFail($request['order_id']);

        
        if($order->order_products == null){
            return back()->with('error', "can't checkout an empty order");
        }

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
        
        return redirect()->away($session->url);
    }

    public function success(Request $request)
    {
        // dd($request);

        Mail::to(Auth::user()->name)->send(new OrderEmail());
        return back()->with("succes", "Thanks for you order, You have just completed your payment. you'll find the receipt in your email");
    }
}