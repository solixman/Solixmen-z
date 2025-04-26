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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('image');
            $table->string('type');
            $table->float('price');
            $table->integer('quantity');
            $table->text('description');
            $table->integer('categorie_id')->nullable();
            $table->foreign('categorie_id')->constrained()->references('id')->on('categories');
            $table->integer('admin_id')->nullable();
            $table->foreign('admin_id')->constrained()->references('id')->on('users');
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
        Schema::dropIfExists('products');
    }
};
