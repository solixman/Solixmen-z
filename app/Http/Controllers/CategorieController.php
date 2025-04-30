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
        $category = $this->categorieRepository->getOneCategorie($request['id']);       
        try {
            $fields = $request->validate([
                'name' => 'required|string|max:255|unique:categories,name,' . $category->id . ',id',
                'description' => 'nullable|string',
            ]);
       
            $category->name = $fields['name'];
            $category->description = $fields['description'];
            $this->categorieRepository->saveCategorie($category);

        } catch (Exception $e) {
            return $e->getMessage();
        }

        return redirect()->back()
        ->with('success', 'category updated succesfully');
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