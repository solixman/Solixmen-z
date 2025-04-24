<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order_product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $total = 0;

        //creating the order
        $order = new Order();
        $user = Auth::user();
        $order->user_id = Auth::user()->id;
        $order->status = 'pending';
        $order->orderDate = now();
        $order->address_id = 1;
        $order->save();
        
        //create order_products from session
        $cart = Session::get('cart');
        foreach ($cart as $cart) {
            $OP = new Order_product;
            $OP->quantity = $cart['quantity'];
            $OP->priceAtMoment  = $cart['price'];
            $OP->product_id = $cart['id'];
            $OP->subtotal = $cart['price'] * $cart['quantity'];
            $OP->order_id = $order->id;
            $OP->save();
            dd($OP->product);
            $total = $order->Total + $OP->subtotal;
        }
        $order->save();

        return view('client.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
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
    public function destroy(Order $order)
    {
        //
    }



    // public function ProcessOrder(Request $request){

    //     $order = Order::find($request['order_id']);
    // return view('Payement', compact('order'));
    // }




    // public function ShowAllorders(){
    //   $orders=Order::with('User')->get();
    // //   dd($orders);
    //   return view('AdminOrders',compact('orders'));
    // }

    // public function ShowAllordersClient(){
    //    $user=Auth::user();
    //     $orders=Order::where('user_id',$user->id)->get();
    //     return view('ClientOrders',compact('orders'));
    // }

    //     public function cancelOrder($id)
    // {   
    //     $order = Order::findOrFail($id);

    //     if($order->status == 'completed'){

    //         return back()->with('error','Order already completed');

    //     }else if($order->status != 'completed'){

    //     $order->status = 'cancelled';
    //     $order->save();
    //     return redirect()->back()->with('success', 'Order cancelled successfully.');
    //     }
    // }

    // public function updateOrderStatus(Request $request, $id)
    // {
    //     $order = Order::findOrFail($id);
    //     $order->status = $request->input('status');
    //     $order->save();

    //     return redirect()->back()->with('success', 'Order status updated successfully.');
    // }

}
