@extends('client.layout')

@section('title', 'Collections | ELEGANCE')

@section('content')
<div class="bg-white">
    <!-- Breadcrumb -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <nav class="flex text-sm">
            <a href="/" class="text-stone-500 hover:text-stone-700">Home</a>
            <span class="mx-2 text-stone-400">/</span>
            <span class="text-stone-800">Collections</span>
        </nav>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
   

    
            
    
            <div class="flex-1">
               
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-10">
                    @forEach($products as $product)
           
                    <div class="group">
                        <div class="relative overflow-hidden rounded-lg mb-4">
                            <a href="/product/silk-blouse">
                                <img 
                                    src="{{$product->image}}" 
                                    alt="{{$product->titre}}" 
                                    class="w-full h-80 object-cover transition duration-500 group-hover:scale-105">
                            </a>
                            <div class="absolute inset-0 bg-stone-900/0 group-hover:bg-stone-900/10 transition duration-300"></div>
                            <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 bg-white bg-opacity-90">
                                <button class="w-full py-2 bg-stone-800 text-white hover:bg-stone-900 transition duration-150 ease-in-out rounded">Add to Cart</button>
                            </div>
                            <button class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white flex items-center justify-center text-stone-600 hover:text-stone-900 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                        </div>
                        <h3 class="font-medium mb-1">
                            <a href="/product/silk-blouse" class="hover:underline">{{$product->titre}}</a>
                        </h3>
                        <p class="text-stone-600 mb-2">{{$product->type}}</p>
                        <p class="font-medium">{{$product->price}}</p>
                    </div>
                    @endforeach
                    </div>
            
    </div>
</div>
@endsection

