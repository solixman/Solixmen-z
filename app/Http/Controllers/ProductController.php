<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Categorie;
use Exception;
use Illuminate\Http\Message;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $products = Product::paginate(7);
            if ($products == null) {
                throw new Exception('there are no products');
            }
            return view('admin/partials/products', compact('products'));
        } catch (Exception $e) {
            return  back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        try {
            $categories = Categorie::all();
            return view('admin/partials/product_form', compact('categories'));
        } catch (Exception $e) {
            return back()->with('error', 'something went wrong');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request)
    {
        try {
            // dd($request['id']);
            if ($request['id'] != null) {
                $product = Product::find($request['id']);
                
            } else {
                
                $product = new Product();
            }
            $product->titre = $request['titre'];
            $product->image = $request['image'];
            $product->price = $request['price'];
            $product->type = $request['type'];
            $product->quantity = $request['quantity'];
            $product->description = $request['description'];
            $product->categorie_id = $request['categorie'];
            $product->save();
            return redirect('/admin/products')->with('success', 'product stored succesfully');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function show(Product $product)
    {
        try {
            $products = Product::paginate(10);
            if ($products == null) {
                throw new Exception('there are no products');
            }
            return view('client/partials/product_listing', compact('products'));
        } catch (Exception $e) {
            return  back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        try {
            $product = product::find($request['id']);
            $categories = Categorie::all();

            return view('admin/partials/product_form', compact('categories'), compact('product'));
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $product=Product::find($request->id)->first();
            $product->delete();
            return back()->with('success','product deleted succesfully');
        } catch (Exception $e) {
            return  back()->with('error',$e->getMessage());
        }
    }
}
