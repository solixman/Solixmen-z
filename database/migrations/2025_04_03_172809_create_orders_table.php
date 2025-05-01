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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('shipping')->default('standard shipping');
            $table->dateTime('orderDate');
            $table->integer('tax')->default(10);
            $table->integer('user_id')->nullable();
            $table->foreign('user_id')->constrained()->references('id')->on('users');
            $table->integer('address_id')->nullable();
            $table->foreign('address_id')->constrained()->references('id')->on('addresses');
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
        Schema::dropIfExists('orders');
    }
};
