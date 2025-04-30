<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\JwtMiddleware;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('client.partials.home');
});


Route::get('/register',function (){
    return view('comon.register');
});

Route::get('/cart',function (){
    return view('client.partials.cart');
});





Route::get('/login',function (){
    return view('comon.login');
})->name('login');






Route::get('/admin',function (){
    return view('admin.partials.dashboard');
});





Route::get('/admin/order/details',function (){
    return view('comon.order_details');
});








Route::middleware(['auth'])->group(function (){

    Route::get('/profile',function (){
        return view('comon.profile');
    });
});

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::middleware([JwtMiddleware::class])->group(function () {
    Route::get('/user', [AuthController::class, 'getUser']);
    Route::get('/logout', [AuthController::class, 'logout']);
});


Route::get('/admin/customers',[UserController::class,'index']);
Route::post('/admin/customer/suspend',[UserController::class,'suspend']);
Route::post('/admin/customer/Role/Change',[UserController::class,'changeRole']);
Route::get('/admin/profile',[UserController::class,'profileAdmin']);
Route::post('/customer/modify',[UserController::class,'update']);

Route::get('/admin/products',[ProductController::class,'index']);
//to show the form
Route::get('/product/create',[ProductController::class,'create']);
//to show the form with infos
Route::get('/product/update',[ProductController::class,'edit']);
//to store product for all cases
Route::post('/product/store',[ProductController::class,'store']);
//to destroy product
Route::delete('/product/delete',[ProductController::class,'destroy']);

//show peoducts for customer
Route::get('/listing',[ProductController::class,'show']);
//for women
Route::get('/women',[ProductController::class,'women']);
//show product details
Route::get('/product',[ProductController::class,'showDetails']);
//add to cart
Route::get('/product/add/cart',[ProductController::class,'addToCart']);
//remove from cart
Route::get('/product/remove/cart',[ProductController::class,'removeFromCart']);
//update product in cart
Route::post('/cart/save/changes',[ProductController::class,'updateOneInCart']);

//create order
Route::get('/order/create',[OrderController::class,'store']);

Route::get('/order/details/',[OrderController::class,'showOrder'])->name('order.details');

Route::get('/order/update',[OrderController::class,'update'])->name('admin.orders.update');

Route::get('/order/cancel',[OrderController::class,'cancelOrder'])->name('order.cancel');



//show orders for admin
Route::get('/admin/orders',[OrderController::class,'index'])->name('admin.orders');
//show orders for client
Route::get('/client/orders',[OrderController::class,'ShowOrdersClient'])->name('client.orders');



Route::get('/checkout',[ StripeController::class,'checkout'])->name('Checkout');
Route::post('/session', [StripeController::class,'session'])->name('session');
Route::get('/success', [StripeController::class,'success'])->name('checkout.success');

//crud des categories
Route::post('/category/store/', [CategorieController::class, 'store'])->name('categories.store');
Route::post('/category/update', [CategorieController::class, 'update'])->name('categories.update');
Route::delete('/category/delete', [CategorieController::class, 'destroy'])->name('categories.delete');


