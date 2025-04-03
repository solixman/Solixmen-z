@extends('admin.layout')

@section('admin-title', isset($product) ? 'Edit Product' : 'Add New Product')

@section('admin-content')
<div class="mb-6">
    <a href="{{ route('admin.products') }}" class="text-stone-600 hover:text-stone-900 inline-flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
        </svg>
        Back to Products
    </a>
</div>

<form action="{{ isset($product) ? route('admin.products.update', $product->id) : route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($product))
        @method('PUT')
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Product Information -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-lg shadow-sm border border-stone-100 p-6">
                <h3 class="text-lg font-medium text-stone-800 mb-4">Product Information</h3>
                
                <div class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-stone-700 mb-1">Product Name</label>
                        <input type="text" id="name" name="name" value="{{ $product->name ?? old('name') }}" class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md" required>
                    </div>
                    
                    <div>
                        <label for="description" class="block text-sm font-medium text-stone-700 mb-1">Description</label>
                        <textarea id="description" name="description" rows="4" class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md">{{ $product->description ?? old('description') }}</textarea>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="sku" class="block text-sm font-medium text-stone-700 mb-1">SKU</label>
                            <input type="text" id="sku" name="sku" value="{{ $product->sku ?? old('sku') }}" class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md">
                        </div>
                        
                        <div>
                            <label for="category" class="block text-sm font-medium text-stone-700 mb-1">Category</label>
                            <select id="category" name="category_id" class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md">
                                <option value="">Select Category</option>
                                <option value="1" {{ (isset($product) && $product->category_id == 1) ? 'selected' : '' }}>Women</option>
                                <option value="2" {{ (isset($product) && $product->category_id == 2) ? 'selected' : '' }}>Men</option>
                                <option value="3" {{ (isset($product) && $product->category_id == 3) ? 'selected' : '' }}>Accessories</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-sm border border-stone-100 p-6">
                <h3 class="text-lg font-medium text-stone-800 mb-4">Pricing & Inventory</h3>
                
                <div class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="price" class="block text-sm font-medium text-stone-700 mb-1">Regular Price</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-stone-500">$</span>
                                </div>
                                <input type="number" step="0.01" id="price" name="price" value="{{ $product->price ?? old('price') }}" class="w-full pl-8 pr-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md">
                            </div>
                        </div>
                        
                        <div>
                            <label for="sale_price" class="block text-sm font-medium text-stone-700 mb-1">Sale Price</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-stone-500">$</span>
                                </div>
                                <input type="number" step="0.01" id="sale_price" name="sale_price" value="{{ $product->sale_price ?? old('sale_price') }}" class="w-full pl-8 pr-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md">
                            </div>
                        </div>
                        
                        <div>
                            <label for="stock" class="block text-sm font-medium text-stone-700 mb-1">Stock Quantity</label>
                            <input type="number" id="stock" name="stock" value="{{ $product->stock ?? old('stock') }}" class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md">
                        </div>
                    </div>
                    
                    <div class="flex items-center">
                        <input type="checkbox" id="track_inventory" name="track_inventory" class="h-4 w-4 text-stone-600 focus:ring-stone-500 border-stone-300 rounded" {{ (isset($product) && $product->track_inventory) ? 'checked' : '' }}>
                        <label for="track_inventory" class="ml-2 block text-sm text-stone-700">Track inventory</label>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-sm border border-stone-100 p-6">
                <h3 class="text-lg font-medium text-stone-800 mb-4">Product Images</h3>
                
                <div class="space-y-4">
                    <div class="border-2 border-dashed border-stone-300 rounded-lg p-6 text-center">
                        <div class="space-y-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-stone-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <div class="text-sm text-stone-600">
                                <label for="images" class="relative cursor-pointer bg-white rounded-md font-medium text-stone-800 hover:text-stone-600 focus-within:outline-none">
                                    <span>Upload images</span>
                                    <input id="images" name="images[]" type="file" class="sr-only" multiple>
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-stone-500">PNG, JPG, GIF up to 10MB</p>
                        </div>
                    </div>
                    
                    @if(isset($product) && $product->images)
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                        @foreach($product->images as $image)
                        <div class="relative group">
                            <img src="{{ $image->url }}" alt="{{ $product->name }}" class="h-24 w-full object-cover rounded-md">
                            <div class="absolute inset-0 bg-stone-900 bg-opacity-0 group-hover:bg-opacity-50 transition-opacity flex items-center justify-center">
                                <button type="button" class="text-white opacity-0 group-hover:opacity-100 transition-opacity">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Sidebar -->
        <div class="space-y-6">
            <div class="bg-white rounded-lg shadow-sm border border-stone-100 p-6">
                <h3 class="text-lg font-medium text-stone-800 mb-4">Product Status</h3>
                
                <div class="space-y-4">
                    <div>
                        <label for="status" class="block text-sm font-medium text-stone-700 mb-1">Status</label>
                        <select id="status" name="status" class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md">
                            <option value="active" {{ (isset($product) && $product->status == 'active') ? 'selected' : '' }}>Active</option>
                            <option value="draft" {{ (isset($product) && $product->status == 'draft') ? 'selected' : '' }}>Draft</option>
                            <option value="archived" {{ (isset($product) && $product->status == 'archived') ? 'selected' : '' }}>Archived</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="visibility" class="block text-sm font-medium text-stone-700 mb-1">Visibility</label>
                        <select id="visibility" name="visibility" class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md">
                            <option value="visible" {{ (isset($product) && $product->visibility == 'visible') ? 'selected' : '' }}>Visible</option>
                            <option value="hidden" {{ (isset($product) && $product->visibility == 'hidden') ? 'selected' : '' }}>Hidden</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-sm border border-stone-100 p-6">
                <h3 class="text-lg font-medium text-stone-800 mb-4">Product Organization</h3>
                
                <div class="space-y-4">
                    <div>
                        <label for="tags" class="block text-sm font-medium text-stone-700 mb-1">Tags</label>
                        <input type="text" id="tags" name="tags" value="{{ $product->tags ?? old('tags') }}" placeholder="Separate with commas" class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md">
                    </div>
                    
                    <div>
                        <label for="collections" class="block text-sm font-medium text-stone-700 mb-1">Collections</label>
                        <select id="collections" name="collections[]" multiple class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md">
                            <option value="1">New Arrivals</option>
                            <option value="2">Summer Collection</option>
                            <option value="3">Winter Essentials</option>
                            <option value="4">Best Sellers</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-sm border border-stone-100 p-6">
                <h3 class="text-lg font-medium text-stone-800 mb-4">Search Engine Optimization</h3>
                
                <div class="space-y-4">
                    <div>
                        <label for="meta_title" class="block text-sm font-medium text-stone-700 mb-1">Meta Title</label>
                        <input type="text" id="meta_title" name="meta_title" value="{{ $product->meta_title ?? old('meta_title') }}" class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md">
                    </div>
                    
                    <div>
                        <label for="meta_description" class="block text-sm font-medium text-stone-700 mb-1">Meta Description</label>
                        <textarea id="meta_description" name="meta_description" rows="3" class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md">{{ $product->meta_description ?? old('meta_description') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="mt-6 flex justify-end space-x-3">
        <button type="button" class="px-4 py-2 border border-stone-300 rounded-md text-stone-700 bg-white hover:bg-stone-50">Cancel</button>
        <button type="submit" class="px-4 py-2 bg-stone-800 hover:bg-stone-900 text-white rounded-md">{{ isset($product) ? 'Update Product' : 'Create Product' }}</button>
    </div>
</form>
@endsection