<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Categorie;
use Exception;
use Illuminate\Http\Message;
use Illuminate\Http\Request;
use Lcobucci\JWT\Validation\Constraint\ValidAt;

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
            $products = Product::where('deleted_at',null)->paginate(7);
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
    public function create()
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
    public function store(Request $request)
    {
        try {
            $fields=$request->validate([
              'name'=>'required|string|max:255',
              'image'=>'required|string|',
              'price'=>'required|numeric',
              'type'=>'required|string|max:255',
              'quantity','required|integer|min:1',
              'description'=>'required|',
              'categorie'=>'required|numeric|min:1'

            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }

        try {
            if ($request['id'] != null) {
                $product = Product::findOrFail($request['id']);
                
            } else {
                
                $product = new Product();
            }
            $product->name = $fields['name'];
            $product->image = $fields['image'];
            $product->price = $fields['price'];
            $product->type = $fields['type'];
            $product->quantity = $fields['quantity'];
            $product->description = $fields['description'];
            $product->categorie_id = $fields['categorie'];
            $product->save();
            return redirect('/admin/products')->with('success', 'product stored succesfully');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

   
    // public function women(){
    //     try{
    //     $products= Product::
    //     }
    // }

    public function show(Product $product)
    {
        try {
            $products = Product::where('deleted_at',null)->paginate(10);
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
            $product = product::findOrFail($request['id']);
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
            $product=Product::findOrFail($request->id);
            $product->deleted_at=now();
            $product->save();
            return back()->with('success','product deleted succesfully');
        } catch (Exception $e) {
            return  back()->with('error',$e->getMessage());
        }
    }

    public function showDetails(Request $request)
    {
        try {
            $product = Product::findOrFail($request['id']);
            if ($product == null) {
                throw new Exception('there are no products');
            }
            return view('client/partials/product_details', compact('product'));
        } catch (Exception $e) {
            return  back()->with('error', $e->getMessage());
        }
    }


    public function addToCart(Request $request){
        
     
        if(!isset($request['quantity'])){
        $quantity=1;
        
        }else{
            $quantity=$request['quantity'];
        }

        if(!isset($request['color'])){
        $color='not chosen';
        }else{
            $color=$request['color'];
        }
        if(!isset($request['size'])){
            $size='M';
        }else{
            $size=$request['size'];
        }

            try {
            // Session::forget('cart');
            $id = $request['id'];
            $product = Product::findOrFail($id);
            $cart = session()->get('cart', []);
            if(isset($cart[$id])) {
                $cart[$id]['quantity']+=$request['quantity'];
            } else {
                $cart[$id] = [
                    "id"=> $product->id,
                    "name" => $product->name,
                    "quantity" => $quantity,
                    "color"=>$color,
                    "size"=>$size,
                    "price" => $product->price,
                    "image" => $product->image
                ];
            }
            
            session()->put('cart', $cart);
            // dd($cart[$id]['quantity']);
            // dd(session()->get('cart'));
            return  back()->with('success', 'Product added to cart successfully!');
        } catch (Exception $e) {
            return back()->with('error',$e->getMessage());
        }
        }
     

     public function RemoveFromCart(Request $request) {
        try {
            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return back()->with('success', 'Product removed successfully');
        } catch (Exception $e) {
            return back()->with('succes',$e->getMessage());
        }
}

}



