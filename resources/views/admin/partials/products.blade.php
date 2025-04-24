@extends('admin.layout')

@section('admin-title', 'Products')

@section('admin-content')
<div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div class="flex items-center gap-2">
        <div class="relative">
            <input type="text" placeholder="Search products..." class="pl-10 pr-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md w-full sm:w-64">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-stone-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
        <div class="relative">
            <select class="pl-4 pr-10 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md appearance-none bg-white">
                <option value="">All Categories</option>
                <option value="women">Women</option>
                <option value="men">Men</option>
                <option value="accessories">Accessories</option>
            </select>
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-stone-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
    </div>
    <a href="/product/create" class="bg-stone-800 hover:bg-stone-900 text-white px-4 py-2 rounded-md transition duration-150 ease-in-out inline-flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
        </svg>
        Add New Product
    </a>
</div>

<div class="bg-white rounded-lg shadow-sm border border-stone-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-stone-50 text-left">
                <tr>
                    <th class="px-6 py-3 text-xs font-medium text-stone-500 uppercase tracking-wider">Product</th>
                    <th class="px-6 py-3 text-xs font-medium text-stone-500 uppercase tracking-wider">SKU</th>
                    <th class="px-6 py-3 text-xs font-medium text-stone-500 uppercase tracking-wider">Category</th>
                    <th class="px-6 py-3 text-xs font-medium text-stone-500 uppercase tracking-wider">Price</th>
                    <th class="px-6 py-3 text-xs font-medium text-stone-500 uppercase tracking-wider">Stock</th>
                    {{-- <th class="px-6 py-3 text-xs font-medium text-stone-500 uppercase tracking-wider">Status</th> --}}
                    <th class="px-6 py-3 text-xs font-medium text-stone-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-100">
                @forEach($products as $product)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="h-10 w-10 rounded bg-stone-100 mr-3"></div>
                            <div>
                                <div class="text-sm font-medium">{{$product->name}}</div>
                                <div class="text-xs text-stone-500">{{$product->type}}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">BLZ-001</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{$product->categorie->name}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">${{$product->price}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{$product->quantity}}</td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        <form action="/product/update" method="post" class="inline">
                            @csrf
                            <input type="hidden" for="id" name="id" value={{$product->id}} />
                            <button type="submit" class="text-stone-600 hover:text-stone-900 transition-colors bg-transparent border-0 p-0 m-0 cursor-pointer font-sans text-sm font-normal appearance-none focus:outline-none">
                              View/Edit
                            </button>
                        </form>
                        <form action="/product/delete" method="post" class="inline">
                            @csrf
                            <input type="hidden" for="id" name="id" value="{{$product->id}}" />
                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
               
            </tbody>
        </table>
        {{$products->links()}}
    </div>
   
</div>
@endsection