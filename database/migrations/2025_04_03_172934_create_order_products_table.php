<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->float('priceAtMoment');
            $table->integer('quantity');
            $table->float('subtotal');
            $table->integer('product_id');
            $table->foreign('product_id')->constrained()->references('id')->on('products');
            $table->integer('order_id');
            $table->foreign('order_id')->constrained()->references('id')->on('orders');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_products');
    }
};
