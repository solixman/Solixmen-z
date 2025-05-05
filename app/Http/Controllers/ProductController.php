<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Categorie;
use App\repositories\interfaces\CategorieRepositoryInterface;
use App\repositories\interfaces\productRepositoryInterface;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Lcobucci\JWT\Validation\Constraint\ValidAt;

class ProductController extends Controller
{
    private $productRepository;
    private $categorieRepository;

    public function __construct(productRepositoryInterface $productRepository, CategorieRepositoryInterface $categorieRepository)
    {
        $this->productRepository = $productRepository;
        $this->categorieRepository = $categorieRepository;
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $products = $this->productRepository->getAllProducts();
            $categories = $this->categorieRepository->getAllCategories();
            return view('admin/partials/products', compact('products', 'categories'));
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
            $categories = $this->categorieRepository->getAllCategories();
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
        // dd($request['quantity']);
        try {
            $fields = $request->validate([
                'name' => 'required|string|max:255',
                'image' => 'required|string|',
                'price' => 'required|numeric',
                'type' => 'required|string|max:255',

                'description' => 'required|',
                'categorie' => 'required|numeric|min:1'

            ]);

            if ($request['id'] != null) {
                $product = $this->productRepository->getOneProduct($request['id']);
            } else {

                $product = new Product();
            }
            $product->name = $fields['name'];
            $product->image = $fields['image'];
            $product->price = $fields['price'];
            $product->type = $fields['type'];
            $product->quantity = $request['quantity'];
            $product->description = $fields['description'];
            $product->categorie_id = $fields['categorie'];

            $this->productRepository->saveProduct($product);
            return redirect('/admin/products')->with('success', 'product stored succesfully');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }




    public function show(Request $request)
    {
        // dd( $request['categorie']);
        try {
            if ($request['categorie']) {
                $products = $this->productRepository->getByCategorie($request['categorie']);

            } elseif($request['searchign_word']) {
                $products = $this->productRepository->searchByword($request['searchign_word']);
            }else{
                $products = $this->productRepository->getAllProducts();
                
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
            $product = $this->productRepository->getOneProduct($request['id']);
            $categories = $this->categorieRepository->getAllCategories();

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
            $product = $this->productRepository->getOneProduct($request['id']);
            $product->deleted_at = now();
            $this->productRepository->saveProduct($product);
            return back()->with('success', 'product deleted succesfully');
        } catch (Exception $e) {
            return  back()->with('error', $e->getMessage());
        }
    }

    public function showDetails(Request $request)
    {
        try {
            $product = $this->productRepository->getOneProduct($request['id']);

            $images = $this->productRepository->getProductImages($product->id);

            return view('client/partials/product_details', compact('product', 'images'));
        } catch (Exception $e) {
            return  back()->with('error', $e->getMessage());
        }
    }


    public function addToCart(Request $request)
    {

        if (!isset($request['quantity'])) {
            $quantity = 1;
        } else {
            $quantity = $request['quantity'];
        }

        if (!isset($request['color'])) {
            $color = 'black';
        } else {
            $color = $request['color'];
        }
        if (!isset($request['size'])) {
            $size = 'M';
        } else {
            $size = $request['size'];
        }

        try {
            // Session::forget('cart');
            $id = $request['id'];
            $product = $product = $this->productRepository->getOneProduct($request['id']);
            $cart = session()->get('cart', []);
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] += $quantity;
                $cart[$id]['color'] = $color;
                $cart[$id]['size'] = $size;
            } else {
                $cart[$id] = [
                    "id" => $product->id,
                    "name" => $product->name,
                    "quantity" => $quantity,
                    "color" => $color,
                    "size" => $size,
                    "price" => $product->price,
                    "image" => $product->image
                ];
            }

            session()->put('cart', $cart);
            return  back()->with('success', 'Product added to cart successfully!');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }


    public function RemoveFromCart(Request $request)
    {
        try {
            $cart = session()->get('cart');

            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return back()->with('success', 'Product removed successfully');
        } catch (Exception $e) {
            return back()->with('succes', $e->getMessage());
        }
    }



    public function updateOneInCart(Request $request)
    {
        try {
            $cart = Session()->get('cart');
            if ($cart[$request['id']] == null) {
                return back()->with('error', 'something went wrong');
            } else {
                $cart[$request['id']]['quantity'] = $request['quantity'];
                $cart[$request['id']]['color'] = $request['color'];
                $cart[$request['id']]['size'] = $request['size'];
            }
            Session()->put('cart', $cart);
            return back()->with('succes', 'data updated succesfully');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
