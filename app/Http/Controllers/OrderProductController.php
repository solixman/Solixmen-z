<?php

namespace App\Http\Controllers;

use App\Models\Order_product;
use App\Http\Requests\StoreOrder_productRequest;
use App\Http\Requests\UpdateOrder_productRequest;
use Illuminate\Http\Request;

class Order_productController extends Controller
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
     * @param  \App\Http\Requests\StoreOrder_productRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order_product  $order_product
     * @return \Illuminate\Http\Response
     */
    public function show(Order_product $order_product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order_product  $order_product
     * @return \Illuminate\Http\Response
     */
    public function edit(Order_product $order_product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrder_productRequest  $request
     * @param  \App\Models\Order_product  $order_product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order_product $order_product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order_product  $order_product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order_product $order_product)
    {
        //
    }
}
