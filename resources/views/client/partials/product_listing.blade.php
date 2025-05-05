@extends('client.layout')

@section('title', 'Collections | ELEGANCE')

@section('styles')
<style>
    .category-tab.active {
        border-color: #2e2928;
        color: #292524;
    }
    
    .filter-dropdown {
        display: none;
    }
    
    .filter-dropdown.show {
        display: block;
    }
</style>
@endsection

@section('content')
<!-- Header & Breadcrumb -->
<div class="bg-stone-50 border-b border-stone-200">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <nav class="flex text-sm mb-4">
            <a href="/" class="text-stone-500 hover:text-stone-700">Home</a>
            <span class="mx-2 text-stone-400">/</span>
            <span class="text-stone-800">Our Products</span>
        </nav>
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
            <h1 class="text-2xl md:text-3xl font-serif text-stone-800 mb-2 md:mb-0">Our Collections</h1>
            <p class="text-stone-600"><span class="font-medium">{{ count($products) }}</span> products</p>
        </div>
    </div>
</div>

<!-- Products Grid -->
<div class="bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-6 gap-y-10">
            @foreach($products as $product)
            <div class="group">
                <div class="relative overflow-hidden rounded-lg mb-4">
                    <a href="/product?id={{($product->id)}}">
                        @csrf
                        <img 
                            src="{{ $product->image }}" 
                            alt="{{ $product->name }}" 
                            class="w-full h-80 object-cover transition duration-500 group-hover:scale-105">
                    </a>
                    <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 bg-white bg-opacity-90">
                        <form action="/product/add/cart">
                            <input type="hidden" name="id" value="{{$product->id}}">
                        <button class="w-full py-2 bg-stone-800 text-white hover:bg-stone-900 transition duration-150 ease-in-out rounded">Add to Cart</button>
                    </form>
                    </div>
                    
                    <form action="/product/Like"></form>
                    <button class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white flex items-center justify-center text-stone-600 hover:text-stone-900 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </button>
                    
                    @if(Carbon\Carbon::parse($product->created_at) > Carbon\Carbon::now()->startOfWeek() )
                    <div class="absolute top-3 left-3">
                        <span class="inline-block bg-stone-800 text-white text-xs px-2 py-1 rounded">New</span>
                    </div>
                    @endif
                </div>
                <h3 class="font-medium mb-1">
                    <a href="/product?id={{$product->id}}" class="hover:underline">{{ $product->name }}</a>
                </h3>
                <p class="text-stone-600 mb-2">{{ $product->type }}</p>
                <p class="font-medium">${{ number_format($product->price, 2) }}</p>
            </div>
            @endforeach
            {{$products->links()}}
        </div>
        
        
     
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Toggle filter dropdowns
    document.addEventListener('DOMContentLoaded', function() {
        const filterButtons = document.querySelectorAll('#filter-price button, #filter-color button, #filter-size button, #sort-options button');
        
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                const parent = this.parentElement;
                const dropdown = parent.querySelector('.filter-dropdown');
                
                // Close all other dropdowns
                document.querySelectorAll('.filter-dropdown.show').forEach(el => {
                    if (el !== dropdown) {
                        el.classList.remove('show');
                    }
                });
                
                // Toggle current dropdown
                dropdown.classList.toggle('show');
            });
        });
        
        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            const isFilterButton = Array.from(filterButtons).some(button => button.contains(event.target));
            const isFilterDropdown = event.target.closest('.filter-dropdown');
            
            if (!isFilterButton && !isFilterDropdown) {
                document.querySelectorAll('.filter-dropdown.show').forEach(dropdown => {
                    dropdown.classList.remove('show');
                });
            }
        });
    });
</script>
@endsection