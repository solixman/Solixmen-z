<?php

namespace App\repositories\interfaces;

use App\Models\Order;
use App\Models\Order_product;

interface OrderRepositoryInterface{

    public function getOneOrder($id);
    public function saveOrder($order);
    public function getClientOrders($id);
    public function getAllorders();
    public function saveOrderProduct(Order_product $OP);
    public function deleteOrder(Order $order);
    public function getLast5();
    public function getTotalSales();
    public function getorderCount();


    
}