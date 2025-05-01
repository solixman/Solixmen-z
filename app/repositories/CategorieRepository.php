<?php


namespace App\repositories;

use App\Models\Categorie;
use App\repositories\interfaces\CategorieRepositoryInterface;

class CategorieRepository implements CategorieRepositoryInterface{


    public function saveCategorie(Categorie $categorie){
    
        $categorie->save();

    }

    public function getOneCategorie($id){
        return Categorie::findOrFail($id);
    }

    public function deleteCategorie(Categorie $category)
    {
        $category->delete();
    }

    public function getAllCategories()
    {
        return Categorie::paginate(8, ['*'], 'categories_page');
    }
}