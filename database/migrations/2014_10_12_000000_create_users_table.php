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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('role_id')->default(2);
            $table->foreign ('role_id')->constrained()->references('id')->on('roles');
            $table->integer('address_id')->nullable();
            $table->foreign ('address_id')->constrained()->references('id')->on('addresses');
            $table->bigInteger('phoneNumber')->nullable();
            $table->text('image')->default('https://as1.ftcdn.net/v2/jpg/03/46/83/96/1000_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg');
            $table->string('status')->default('active');
            $table->text('bio')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        
        Schema::create('address_user',function (Blueprint $table){
            $table->foreignId('address_id')->constrained();
            $table->foreignId('user_id')->references('id')->on('addresses');
            
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('address_user');
    }
};
