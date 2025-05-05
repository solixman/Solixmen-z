<?php

namespace App\repositories;

use App\Models\Categorie;
use App\Models\Order;
use App\Models\Order_product;
use App\repositories\interfaces\OrderRepositoryInterface;
use Illuminate\Support\Facades\DB;

class OrderRepository implements OrderRepositoryInterface{

    public function getOneOrder($id)
    {
        return Order::findOrFail($id);
    }

    public function saveOrder($order)
    {   
    $order->save();
    }

    public function getClientOrders($id)
    {
        return Order::where('user_id', $id)->where('status','!=','cancelled')->paginate(10);
    }

    public function getAllorders()
    {
        return Order::paginate(10);
    }

    public function saveOrderProduct(Order_product $OP){
        $OP->save();
    }
    public function deleteOrder(Order $order){
    return $order->delete();
    }

    public function getLast5(){
    return  Order::take(5)->get();
    }

    public function getTotalSales(){
        return Order_product::join('orders','orders.id','order_products.order_id')
        ->where('orders.status','paid')
        ->orWhere('orders.status','shipped')
        ->orWhere('orders.status','delivered')
        ->get()->sum('subtotal');
    }
    
    public function getorderCount(){
        return Order::where('status','paid')
        ->orWhere('status','shipped')
        ->orWhere('status','delivered')
        ->get()->count();
    }
}