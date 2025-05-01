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
    $order->delete();
    }
}