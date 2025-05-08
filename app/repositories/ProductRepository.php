<?php

namespace App\repositories;

use App\Models\Categorie;
use App\Models\Product;
use App\repositories\interfaces\productRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ProductRepository implements productRepositoryInterface{

    public function getAllProducts(){
        return  Product::where('deleted_at', null)->paginate(8);
    }

    public function getByCategorie($categorie){
        return Product::where('deleted_at', null)
        ->join('categories','categories.id','products.categorie_id')
        ->where('categories.name',$categorie)->select('products.name','products.image','products.id','products.price','products.type')->paginate(10);
    }
 

    public function saveProduct(Product $product){
      $product->save();
    }

    public function getOneProduct($id){
        return Product::findOrFail($id);
    }

    public function getProductImages($id)
    {
        return DB::table('images')->where('product_id',$id)->select('*')->get();
    }

   

    public function searchByword($word){

        return Product::where('deleted_at', null)
        ->where('name','like','%'.$word.'%')->paginate(10);
    }

    public function getTop5(){
       return Product::withCount('order_products')
        ->orderBy('order_products_count', 'desc')
        ->take(5)->get(); 
    }
    public function getProductCount(){
       return  Product::where('deleted_at', null)->count();
    }
    
    public function getlast4(){
       return  Product::where('deleted_at', null)->OrderBy('created_at')->take(4)->get();
    }

    public function deleteProductImages($id){
    return DB::table('images')->where('product_id', $id)->delete();

    }
    public function  saveProductImages(array $images,$id,$name){
        foreach($images as $image){
            DB::table('images')->insert(['name'=> $name,'path' => $image, 'product_id' => $id]);
        }
    } 

}
