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
            <!-- name -->
            <div>
                <label for="name" class="block text-sm font-medium text-stone-700 mb-1">Product name</label>
                <input type="text" id="name" name="name" value="{{ isset($product) ? $product->name : old('name') }}" class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md" required>
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
                    @if(isset($product))
                    <option name='categorie_id' value="{{$product->categorie->id}}" selected>{{ $product->categorie->name }}</option>
                    @endif
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
                <input type="text" id="type" name="type" value="{{ isset($product) ? $product->type : old('name') }}" class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md" required>
            </div>
            
            <!-- Main Image -->
            <div>
                <label for="image" class="block text-sm font-medium text-stone-700 mb-1">Product Image</label>
                <input type="text" id="image" name="image" value="{{ isset($product) ? $product->image : old('image') }}" class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md" required>

                
                @if(isset($product) && isset($product->image))
                <div class="mt-4">
                    <p class="text-sm font-medium text-stone-700 mb-2">Current Image:</p>
                    <div class="relative group w-32 h-32">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover rounded-md">
                    </div>
                </div>
                @endif
            </div>
            
            <!-- Additional Images (Only for existing products) -->
            @if(isset($product))
            <div class="mt-6">
                <div class="flex items-center justify-between mb-2">
                    <label class="block text-sm font-medium text-stone-700">Additional Images</label>
                    <button type="button" id="add-image-btn" class="px-3 py-1 bg-stone-100 hover:bg-stone-200 text-stone-700 rounded-md text-sm flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Add Image
                    </button>
                </div>
                
                <div id="additional-images-container">



                </div>
                
            </div>
            @endif
        </div>
    </div>
    
    <a href="/admin/products" class="px-4 py-2 border border-stone-300 rounded-md text-stone-700 bg-white hover:bg-stone-50">Cancel</a>
    <button type="submit" class="px-4 py-2 bg-stone-800 hover:bg-stone-900 text-white rounded-md">{{ isset($product) ? 'Update Product' : 'Create Product' }}</button>
</form>

@if(isset($product))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addImageBtn = document.getElementById('add-image-btn');
        const additionalImagesContainer = document.getElementById('additional-images-container');
        
        // Function to add a new image input
        addImageBtn.addEventListener('click', function() {
            const newImageInput = document.createElement('div');
            newImageInput.className = 'additional-image-input flex items-center space-x-2';
            newImageInput.innerHTML = `
                <input type="text" name="additional_images[]" class="flex-1 px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md" placeholder="Enter image URL">
                <button type="button" class="remove-image-btn px-2 py-2 bg-red-50 hover:bg-red-100 text-red-500 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            `;
            additionalImagesContainer.appendChild(newImageInput);
            
            // Add event listener to the new remove button
            const removeBtn = newImageInput.querySelector('.remove-image-btn');
            removeBtn.addEventListener('click', function() {
                newImageInput.remove();
            });
        });
        
        // Event delegation for existing remove buttons
        additionalImagesContainer.addEventListener('click', function(e) {
            if (e.target.closest('.remove-image-btn')) {
                e.target.closest('.additional-image-input').remove();
            }
        });
    });
</script>
@endif

@endsection