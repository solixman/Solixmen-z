<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order_product;
use App\Models\Product;
use App\Models\User;
use App\repositories\interfaces\OrderRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpKernel\Attribute\WithLogLevel;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    private $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }


    public function checkout(Request $request)
    {
        // dd($request);
        $order = $this->orderRepository->getOneOrder($request['id']);

        return view('client.partials.checkout', compact('order'));
    }

    public function index()
    {
        $orders = $this->orderRepository->getAllorders();
        return view('admin.partials.orders', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function createOrderFromCart(Request $request)
    {
        try {
            $cart = Session::get('cart');
            if ($cart != null && count($cart) > 0) {
                
                //creating the order
                $order = new Order();
                $order->user_id = Auth::user()->id;
                $order->status = 'pending';
                $order->orderDate = now();
                $this->orderRepository->saveOrder($order);
                //create order_products from session
                foreach ($cart as $cart) {
                    $OP = new Order_product;
                    $OP->quantity = $cart['quantity'];
                    $OP->priceAtMoment  = $cart['price'];
                    $OP->product_id = $cart['id'];
                    $OP->name = $cart['name'];
                    $OP->subtotal = $cart['price'] * $cart['quantity'];
                    $OP->order_id = $order->id;
                    $this->orderRepository->saveOrderProduct($OP);
                }
            } else {
                return back()->with('error', 'something went wrong');
            }

            // Session::forget('cart');
            return $this->show($order);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('comon.order_details', compact('order'));
    }

    public function showOrder(Request $request)
    {
        $order = $this->orderRepository->getOneOrder($request['id']);
        return $this->show($order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        try{
            $order = $this->orderRepository->getOneOrder($request['id']);
            $this->orderRepository->deleteOrder($order);
            return back()->with('order deleted succesfully');
        }catch(Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }

    public function ShowOrdersClient()
    {
        try {
            if ($user = Auth::user()) {
                $orders = $this->orderRepository->getClientOrders($user->id);
                return view('client.partials.orders', compact('orders'));
            } else {
                return back()->with('error', 'something went wrong');
            }
        } catch (Exception $e) {
            return back()->With('error', $e->getMessage());
        }
    }

    public function cancelOrder(Request $request)
    {
        try {
            $order = $this->orderRepository->getOneOrder($request['id']);

            if ($order->status == 'payed') {

                return back()->with('error', 'Order already payed');
            } else if ($order->status != 'completed') {

                $order->status = 'cancelled';
                $this->orderRepository->saveOrder($order);
                return back()->with('success', 'Order cancelled successfully.');
            }
        } catch (Exception $e) {
            // return back()->with('error', 'failed to cancel, something went wrong');
            return back()->with('error', $e->getMessage());
        }
    }


    public function changeStatus(Request $request)
    {
        $order = $this->orderRepository->getOneOrder($request['id']);
        $order->status = $request['status'];
        $this->orderRepository->saveOrder($order);

        return redirect()->back()->with('success', 'Order status updated successfully.');
    }
}
