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
        $adminRole = Role::create(['name' => 'Admin', 'description' => 'Administrator']);
        $customerRole = Role::create(['name' => 'Customer', 'description' => 'Regular Customer']);

   
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role_id' => $adminRole->id,
        ]);

        $customer = User::create([
            'name' => 'John Doe',
            'email' => 'customer@example.com',
            'password' => Hash::make('password'),
            'role_id' => $customerRole->id,
        ]);

        $address = Address::create([
            'country' => 'maroc',
            'region' => 'California',
            'city' => 'Los Angeles',
            'street' => 'Sunset Blvd',
            'neighborhood' => 'West Hollywood',
            'zipCode' => 99999,
        ]);
       
        Profile::create([
            'image' => 'profile1.jpg',
            'phone' => '123456789',
            'status' => 'Activ',
            'address_id' => $address->id,
            'user_id' => 1,
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
            'titre' => 'Laptop',
            'image' => 'laptop.jpg',
            'type' => 'Electronics',
            'price' => 1200.50,
            'quantity' => 10,
            'description' => 'High-performance laptop',
            'admin_id' => 2,
            'categorie_id'=>$categorie1->id,
        ]);
    

        $product2 = Product::create([
            'titre' => 'T-Shirt',
            'image' => 'tshirt.jpg',
            'type' => 'Clothing',
            'price' => 25.99,
            'quantity' => 50,
            'description' => 'Cotton t-shirt',
            'admin_id' => 1,
            'categorie_id'=>$categorie2->id,
        ]);


        $order = Order::create([
            'orderDate' => now(),
            'status' => 'Pending',
            'user_id' => 2,
            'address_id' => $address->id,
            'totalPrice' => 1226.49,
        ]);

   
        Order_product::create([
            'product_id' => $product1->id,
            'order_id' => $order->id,
            'quantity' => 1,
            'priceAtMoment' => 1200.50,
            'subtotal'=>1200.50,
        ]);

        Order_product::create([
            'product_id' => $product2->id,
            'order_id' => $order->id,
            'quantity' => 1,
            'priceAtMoment' => 25.99,
            'subtotal'=> 25.99,
        ]);
    }
}
