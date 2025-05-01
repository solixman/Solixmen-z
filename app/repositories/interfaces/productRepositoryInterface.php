<?php

namespace App\repositories\interfaces;

use App\Models\Categorie;
use App\Models\Product;

interface productRepositoryInterface{

    public function getAllProducts();
    public function getByCategorie($categorie);
    public function saveProduct(Product $product);
    public function getOneProduct($id);
    public function getProductImages($id);
    // public function SaveCategorie(Categorie $categorie);
}

?>