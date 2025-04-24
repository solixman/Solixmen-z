<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use App\Models\Profile;
use App\Models\Address;
use App\Models\Product;
use App\Models\Categorie;
use App\Models\Order;
use App\Models\Order_product;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create roles
        $admin = Role::create(['name' => 'Admin', 'description' => 'Administrator']);
        $Client = Role::create(['name' => 'Client', 'description' => 'Regular Customer']);


        $admin = User::create([
            'lastName' => 'solix',
            'firstName' => 'jfr',
            'email' => 'admin2@example.com',
            'password' => Hash::make('password'),
            'role_id' => $admin->id,
        ]);

        $customer = User::create([
            'lastName' => 'hamid',
            'firstName' => 's9alli',
            'email' => 'customer@example.com',
            'password' => Hash::make('password'),
            'role_id' => $Client->id,
        ]);

        $address = Address::create([
            'country' => 'maroc',
            'region' => 'California',
            'city' => 'Los Angeles',
            'street' => 'Sunset Blvd',
            'neighborhood' => 'West Hollywood',
            'zipCode' => 99999,
        ]);



        $categorie1 = Categorie::create([
            'name' => 'Electronics',
            'description' => 'Electronic Items',
        ]);

        $categorie2 = Categorie::create([
            'name' => 'Clothing',
            'description' => 'Fashion & Apparel',
        ]);


        // Create products
        $product1 = Product::create([
            'name' => 'Laptop',
            'image' => 'laptop.jpg',
            'type' => 'Electronics',
            'price' => 1200.50,
            'quantity' => 10,
            'description' => 'High-performance laptop',
            'admin_id' => 1,
            'categorie_id' => $categorie1->id,
        ]);


        $product2 = Product::create([
            'name' => 'T-Shirt',
            'image' => 'tshirt.jpg',
            'type' => 'Clothing',
            'price' => 25.99,
            'quantity' => 50,
            'description' => 'Cotton t-shirt',
            'admin_id' => 1,
            'categorie_id' => $categorie2->id,
        ]);


        $order = Order::create([
            'orderDate' => now(),
            'status' => 'Pending',
            'user_id' => 2,
            'address_id' => $address->id,
        ]);


        Order_product::create([
            'product_id' => $product1->id,
            'order_id' => $order->id,
            'quantity' => 1,
            'priceAtMoment' => 1200.50,
            'subtotal' => 1200.50,
        ]);

        Order_product::create([
            'product_id' => $product2->id,
            'order_id' => $order->id,
            'quantity' => 1,
            'priceAtMoment' => 25.99,
            'subtotal' => 25.99,
        ]);
    }
}
