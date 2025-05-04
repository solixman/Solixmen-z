<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_product;
use App\Models\Product;
use App\Models\User;
use App\repositories\interfaces\OrderRepositoryInterface;
use App\repositories\interfaces\productRepositoryInterface;
use App\repositories\interfaces\UserRepositoryInterface;
use App\repositories\UserRepository;
use Illuminate\Cache\Repository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    private $orderRepository;
    private $productRepository;
    private $userRepository;

    public function __construct(OrderRepositoryInterface $orderRepository, productRepositoryInterface $productRepository, UserRepositoryInterface $userRepository)
    {
        $this->orderRepository= $orderRepository;
        $this->productRepository= $productRepository;
        $this->userRepository= $userRepository;
    }

    public function index()
    {
        //getting top orders;
        $orders = $this->orderRepository->getLast5();

        //getting top selling products 
        $products = $this->productRepository->getTop5();

        //getting top users
        $users = $this->userRepository->getTop5();


        //getting total sales
        $totalSales = $this->orderRepository->getTotalSales();

        //getting orders count
        $orderCount= $this->orderRepository->getorderCount();

        // getting customers count
        $customers= $this->userRepository->getActiveCustomersCount();

        //getting products count
        $productsCount= $this->productRepository->getProductCount();

        //returning view 
        return view('admin.partials.dashboard',
         compact('orders','products','users','totalSales','orderCount','customers','productsCount'));
    }
}
