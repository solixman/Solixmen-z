<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
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
    return view('client.partials.register');
});

Route::get('/cart',function (){
    return view('client.partials.cart');
});


Route::get('/checkout',function (){
    return view('client.partials.checkout');
});


Route::get('/login',function (){
    return view('client.partials.login');
})->name('login');


Route::get('/product',function (){
    return view('client.partials.product_details');
});


Route::get('/listing',function (){
    return view('client.partials.product_listing');
});




Route::get('/admin',function (){
    return view('admin.partials.dashboard');
});


Route::get('/admin/customers',[UserController::class,'index']);


Route::get('/admin/order/details',function (){
    return view('admin.partials.order_details');
});
Route::get('/admin/orders',function (){
    return view('admin.partials.orders');
});







Route::middleware(['auth'])->group(function (){

    Route::get('/profile',function (){
        return view('client.partials.profile');
    });
});


Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::middleware([JwtMiddleware::class])->group(function () {
    Route::get('/user', [AuthController::class, 'getUser']);
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::post('/admin/customer/suspend',[UserController::class,'suspend']);
Route::post('/admin/customer/Role/Change',[UserController::class,'changeRole']);
Route::get('/admin/profile',[UserController::class,'profileAdmin']);
Route::post('/customer/modify',[UserController::class,'update']);

Route::get('/admin/products',[ProductController::class,'index']);
//to show the form
Route::get('/product/create',[ProductController::class,'create']);
Route::post('/product/update',[ProductController::class,'edit']);
//to store product for all cases
Route::post('/product/store',[ProductController::class,'store']);
//to destroy product
Route::post('/product/delete',[ProductController::class,'destroy']);