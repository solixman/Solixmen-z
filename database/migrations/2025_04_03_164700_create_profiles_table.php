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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->text('image')->default('https://t4.ftcdn.net/jpg/02/19/05/03/240_F_219050396_Bq6bVwDQ6vvA2Dp64RAgWZnCTmcZ2Gf4.jpg');
            $table->string('phone')->nullable();
            $table->string('status')->default('active');
            $table->integer('user_id');
            $table->foreign('user_id')->constrained()->references('id')->on('users');
            $table->integer('address_id');
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
        Schema::dropIfExists('profiles');
    }
};
