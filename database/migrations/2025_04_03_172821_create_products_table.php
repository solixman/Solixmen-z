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
            $table->string('type');
            $table->text('image')->default('https://imgs.search.brave.com/MBTjJuEhSoJT1VJQwb59tiGM4slpJsFAGRnnfoBcy50/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly90NC5m/dGNkbi5uZXQvanBn/LzAzLzk5LzU1LzU3/LzM2MF9GXzM5OTU1/NTc2OF9mYWNMWkV6/MHJENVloSnhUTzla/MlVFYUgxcjRzTWFt/cy5qcGc');
            $table->float('price');
            $table->integer('quantity');
            $table->text('description');
            $table->integer('categorie_id')->nullable();
            $table->foreign('categorie_id')->constrained()->references('id')->on('categories');
            $table->timestamps();
        });

        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('path');
            $table->foreignId('product_id')->constrained();

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
        Schema::dropIfExists('product_images');
        Schema::dropIfExists('images');
    }
};
