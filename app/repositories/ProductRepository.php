<?php

namespace App\repositories;

use App\Models\Categorie;
use App\Models\Product;
use App\repositories\interfaces\productRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ProductRepository implements productRepositoryInterface{

    public function getAllProducts(){
        return  Product::where('deleted_at', null)->paginate(10)->setPageName('products_page');
    }

    public function getByCategorie($categorie){
        // return  Product::where('deleted_at', null)->paginate(7);
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

    public function SaveCategorie(Categorie $categorie)
    {
        $categorie->save();
    }
}
