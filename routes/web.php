<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\JWTAuthController;
use App\Http\Middleware\JwtMiddleware;
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



Route::get('/cart',function (){
    return view('client.partials.cart');
});


Route::get('/checkout',function (){
    return view('client.partials.checkout');
});


Route::get('/login',function (){
    return view('client.partials.login');
});


Route::get('/product',function (){
    return view('client.partials.product_details');
});


Route::get('/listing',function (){
    return view('client.partials.product_listing');
});


// Route::get('/register',function (){
//     return view('client.partials.register');
// });


Route::get('/admin',function (){
    return view('admin.partials.dashboard');
});


Route::get('/admin/customers',function (){
    return view('admin.partials.customers');
});

Route::get('/admin/order/details',function (){
    return view('admin.partials.order_details');
});
Route::get('/admin/orders',function (){
    return view('admin.partials.orders');
});
Route::get('/admin/product/form',function (){
    return view('admin.partials.product_form');
});
Route::get('/admin/products',function (){
    return view('admin.partials.products');
});

Route::get('account',function (){
    return view('admin.partials.customer_profile');
});


Route::post('register', [JWTAuthController::class, 'register']);
Route::post('login', [JWTAuthController::class, 'login']);

Route::middleware([JwtMiddleware::class])->group(function () {
    Route::get('user', [JWTAuthController::class, 'getUser']);
    Route::post('logout', [JWTAuthController::class, 'logout']);
});