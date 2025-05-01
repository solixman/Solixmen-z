<?php
namespace App\repositories\interfaces;

use App\Models\Categorie;

interface CategorieRepositoryInterface{

    public function saveCategorie(Categorie $category);
    public function getOneCategorie($id);
    public function deleteCategorie(Categorie $category);
    public function getAllCategories();
}