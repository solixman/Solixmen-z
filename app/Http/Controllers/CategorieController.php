<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\repositories\CategorieRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategorieController extends Controller
{

    private $categorieRepository;

    public function __construct(CategorieRepository $categorieRepository)
    {
        $this->categorieRepository=$categorieRepository;
    }


    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' =>'required|string|max:255|unique:categories',
            'description' => 'nullable|string',
        ]);

        $category=new Categorie();
        $category->name=$fields['name'];
        $category->description=$fields['description'];
        $this->categorieRepository->saveCategorie($category);

        return redirect()->back()
            ->with('success', 'Category created succesfully');
    }


    public function update(Request $request)
    {
        try {
        $category = $this->categorieRepository->getOneCategorie($request['id']);       
        $fields = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
            ]);
            $category->name = $fields['name'];
            $category->description = $fields['description'];
            $this->categorieRepository->saveCategorie($category);            
            
            return redirect()->back()
            ->with('success', 'category updated succesfully');

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function destroy(Request $request)
    {        

        $category = $this->categorieRepository->getOneCategorie($request['id']);

        if ($category->products->count() > 0) {

            return back()
                ->with('error', 'deleting is impossible, category has its own products.');
        }

        $category->delete();


        return back()
            ->with('success', 'category deleted succesfully');
    }
}