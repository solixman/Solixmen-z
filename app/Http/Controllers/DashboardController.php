<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_product;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        //getting top orders;
        $orders = Order::take(5)->get();

        //getting top selloing products
        $products = Product::withCount('order_products')
        ->orderBy('order_products_count', 'desc')
        ->take(5)->get();

        //getting top users
        $users = User::withCount('orders')
        ->orderBy('orders_count', 'desc')
        ->take(5)->get();

        //getting total sales
        $totalSales = Order_product::join('orders','orders.id','order_products.order_id')
        ->where('orders.status','paid')
        ->orWhere('orders.status','shipped')
        ->orWhere('orders.status','delivered')
        ->get()->sum('subtotal');

        //getting orders count
        $orderCount= Order::where('status','paid')
        ->orWhere('status','shipped')
        ->orWhere('status','delivered')
        ->get()->count();

        // getting customers count

        $customers= User::join('orders','orders.user_id','users.id')
        ->where('orders.status','paid')
        ->orWhere('orders.status','shipped')
        ->orWhere('orders.status','delivered')
        ->select('users.id')->groupBy('users.id')
        ->get()->count();

        //getting products count
        $productsCount=Product::where('deleted_at', null)->count();

        //returning view 
        return view('admin.partials.dashboard',
         compact('orders','products','users','totalSales','orderCount','customers','productsCount'));
    }
}
