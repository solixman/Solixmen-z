@extends('admin.layout')

@section('admin-titre', isset($product) ? 'Edit Product' : 'Add New Product')

@section('admin-content')
<div class="mb-6">
    <a href="/admin/products" class="text-stone-600 hover:text-stone-900 inline-flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
        </svg>
        Back to Products
    </a>
</div>

<form action="/product/store" method="POST" enctype="multipart/form-data">
    @csrf

    @if(isset($product))
    <input type="hidden" name="id" value="{{$product->id}}">
    @endif
  

    <div class="bg-white rounded-lg shadow-sm border border-stone-100 p-6 mb-6">
        <h3 class="text-lg font-medium text-stone-800 mb-4">Product Information</h3>
        
        <div class="space-y-4">
            <!-- titre -->
            <div>
                <label for="titre" class="block text-sm font-medium text-stone-700 mb-1">Product titre</label>
                <input type="text" id="titre" name="titre" value="{{ isset($product) ? $product->titre : old('titre') }}" class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md" required>
            </div>
            
            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-stone-700 mb-1">Description</label>
                <textarea id="description" name="description" rows="4" class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md">{{ isset($product) ? $product->description : old('description') }}</textarea>
            </div>
            
            <!-- Type -->
            <div>
                <label for="categorie" class="block text-sm font-medium text-stone-700 mb-1">categorie</label>
                <select class="form-select" name='categorie' aria-label="Default select example">
                    <option name='categorie_id' value="{{$product->categorie->id}}" selected>{{ $product->categorie->name }}</option>
                    @foreach($categories as $categorie)
                    <option name='categorie_id'  value="{{$categorie->id}}">{{$categorie ->name}}</option>
                    @endforeach
                  </select>
            </div>
            
            <!-- Price -->
            <div>
                <label for="price" class="block text-sm font-medium text-stone-700 mb-1">Price</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="text-stone-500">$</span>
                    </div>
                    <input type="number" step="0.01" id="price" name="price" value="{{ isset($product) ? $product->price : old('price') }}" class="w-full pl-8 pr-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md" required>
                </div>
            </div>
            
            <!-- Quantity -->
            <div>
                <label for="quantity" class="block text-sm font-medium text-stone-700 mb-1">Quantity</label>
                <input type="number" id="quantity" name="quantity" value="{{ isset($product) ? $product->quantity : old('quantity') }}" class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md" required>
            </div>

            <div>
                <label for="type" class="block text-sm font-medium text-stone-700 mb-1">Product type</label>
                <input type="text" id="type" name="type" value="{{ isset($product) ? $product->type : old('titre') }}" class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md" required>
            </div>
            
            <!-- Image -->
            <div>
                <label for="image" class="block text-sm font-medium text-stone-700 mb-1">Product Image</label>
                <input type="text" id="image" name="image" value="{{ isset($product) ? $product->image : old('image') }}" class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md" required>

                
                @if(isset($product) && isset($product->image))
                <div class="mt-4">
                    <p class="text-sm font-medium text-stone-700 mb-2">Current Image:</p>
                    <div class="relative group w-32 h-32">
                        <img src="{{ $product->image }}" alt="{{ $product->titre }}" class="w-full h-full object-cover rounded-md">
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    
    <div class="flex justify-end space-x-3">
        <a href="/admin/products" class="px-4 py-2 border border-stone-300 rounded-md text-stone-700 bg-white hover:bg-stone-50">Cancel</a>
        <button type="submit" class="px-4 py-2 bg-stone-800 hover:bg-stone-900 text-white rounded-md">{{ isset($product) ? 'Update Product' : 'Create Product' }}</button>
    </div>
</form>
@endsection