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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        
        // $admin = Role::create(['name' => 'Admin', 'description' => 'Administrator']);
        // $Client = Role::create(['name' => 'Client', 'description' => 'Regular Customer']);


        // $admin = User::create([
        //     'lastName' => 'solix',
        //     'firstName' => 'jfr',
        //     'email' => 'solix@gmail.com',
        //     'password' => Hash::make('123123'),
        //     'role_id' => 1,
        // ]);

        // $customer = User::create([
        //     'lastName' => 'hamid',
        //     'firstName' => 's9alli',
        //     'email' => 'hamid@s9lli',
        //     'password' => Hash::make('123123'),
        //     'role_id' => 2  ,
        // ]);

        $address = Address::create([
            'country' => 'maroc',
            'region' => 'casablanca-Settat',
            'city' => 'Casablanca',
            'streetAddress' => 'Hay etissir',
            'zipCode' => 99999,
        ]);
        $address = Address::create([
            'country' => 'maroc',
            'region' => 'Casablanca-Settat',
            'city' => 'Casablanca',
            'streetAddress' => 'mabrouka',
            'zipCode' => 99999,
        ]);



        $categorie1 = Categorie::create([
            'name' => 'Men & women',
            'description' => 'clothes that both men and women can wear',
        ]);

        $categorie2 = Categorie::create([
            'name' => 'Women',
            'description' => 'only for women classy clothing',
        ]);
        $categorie2 = Categorie::create([
            'name' => 'men',
            'description' => 'obly for Men classy clothing',
        ]);
        

        $product1 = Product::create([
            'name' => 'v-FUT t-shirt',
            // 'image' => 'test.img',
            'type' => 'fabric',
            'price' => 1200.50,
            'quantity' => 10,
            'description' => 'a v neck t-shirt wad mase in ...',
            
            'categorie_id' => $categorie1->id,
        ]);

        $product2 = Product::create([
            'name' => 'T-Shirt',
            // 'image' => 'tshirt.jpg',
            'type' => 'summery',
            'price' => 25.99,
            'quantity' => 50,
            'description' => 'Cotton t-shirt',
            'categorie_id' => $categorie2->id,
        ]);

        DB::table('images')->insert([
            'name'=>'testing image',
            'path'=>'https://imgs.search.brave.com/tuVXHuVFMos1veRH7THGKmIt0L9DdqDeSqahpwWURXc/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tLm1l/ZGlhLWFtYXpvbi5j/b20vaW1hZ2VzL0kv/ODFoVXA3QTlQd0wu/anBn',
            'product_id'=>$product2->id
        ]);
        
        DB::table('images')->insert([
            'name'=>'testing2image',
            'path'=>'https://imgs.search.brave.com/tuVXHuVFMos1veRH7THGKmIt0L9DdqDeSqahpwWURXc/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tLm1l/ZGlhLWFtYXpvbi5j/b20vaW1hZ2VzL0kv/ODFoVXA3QTlQd0wu/anBn',
            'product_id'=>$product2->id
        ]);
        
        DB::table('images')->insert([
            'name'=>'testing2image',
            'path'=>'https://imgs.search.brave.com/tuVXHuVFMos1veRH7THGKmIt0L9DdqDeSqahpwWURXc/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tLm1l/ZGlhLWFtYXpvbi5j/b20vaW1hZ2VzL0kv/ODFoVXA3QTlQd0wu/anBn',
            'product_id'=>$product1->id
        ]);
        
        DB::table('images')->insert([
            'name'=>'testing2image',
            'path'=>'https://imgs.search.brave.com/tuVXHuVFMos1veRH7THGKmIt0L9DdqDeSqahpwWURXc/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tLm1l/ZGlhLWFtYXpvbi5j/b20vaW1hZ2VzL0kv/ODFoVXA3QTlQd0wu/anBn',
            'product_id'=>$product1->id
        ]);
        
        DB::table('images')->insert([
            'name'=>'testing image',
            'path'=>'https://imgs.search.brave.com/tuVXHuVFMos1veRH7THGKmIt0L9DdqDeSqahpwWURXc/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tLm1l/ZGlhLWFtYXpvbi5j/b20vaW1hZ2VzL0kv/ODFoVXA3QTlQd0wu/anBn',
            'product_id'=>$product2->id
        ]);
        
        DB::table('images')->insert([
            'name'=>'testing2image',
            'path'=>'https://imgs.search.brave.com/tuVXHuVFMos1veRH7THGKmIt0L9DdqDeSqahpwWURXc/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tLm1l/ZGlhLWFtYXpvbi5j/b20vaW1hZ2VzL0kv/ODFoVXA3QTlQd0wu/anBn',
            'product_id'=>$product2->id
        ]);
        
        DB::table('images')->insert([
            'name'=>'testing2image',
            'path'=>'https://imgs.search.brave.com/tuVXHuVFMos1veRH7THGKmIt0L9DdqDeSqahpwWURXc/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tLm1l/ZGlhLWFtYXpvbi5j/b20vaW1hZ2VzL0kv/ODFoVXA3QTlQd0wu/anBn',
            'product_id'=>$product1->id
        ]);
        
        DB::table('images')->insert([
            'name'=>'testing2image',
            'path'=>'https://imgs.search.brave.com/tuVXHuVFMos1veRH7THGKmIt0L9DdqDeSqahpwWURXc/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tLm1l/ZGlhLWFtYXpvbi5j/b20vaW1hZ2VzL0kv/ODFoVXA3QTlQd0wu/anBn',
            'product_id'=>$product1->id
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
            'name'=>$product1->name,
        ]);

        Order_product::create([
            'product_id' => $product2->id,
            'order_id' => $order->id,
            'quantity' => 1,
            'priceAtMoment' => 25.99,
            'subtotal' => 25.99,
            'name'=>$product2->name,
        ]);
    }
}
