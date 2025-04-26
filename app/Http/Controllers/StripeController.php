<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
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

        dd($order->order_products);
        if($order->order_products !== null){
            return back()->with('error', "can't checkout an empty order");
        }

        $lineItems = [];
        foreach ($order->order_products as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'USD',
                    'product_data' => [
                        'name' => $item->name, // adjust to your column names
                    ],
                    'unit_amount' => (int)($item->price * 100), // assuming 'price' is stored as decimal (e.g., 20.00)
                ],
                'quantity' => $item->quantity,
            ];
        }

        $session = \Stripe\Checkout\Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success'),
            'cancel_url' => route('checkout.cancel'),
        ]);
        
        return redirect()->away($session->url);
    }

    public function success()
    {


        return back()->with("succes", "Thanks for you order You have just completed your payment. The seeler will reach out to you as soon as possible");
    }
}