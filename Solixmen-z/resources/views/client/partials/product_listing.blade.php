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
        <div class="flex flex-col md:flex-row">
            <!-- Sidebar Filters -->
            <div class="w-full md:w-64 mb-8 md:mb-0 md:mr-8">
                <div class="sticky top-24">
                    <h2 class="text-lg font-medium mb-4">Filters</h2>
                    
                    <!-- Category Filter -->
                    <div class="mb-6">
                        <h3 class="text-sm font-medium mb-2">Category</h3>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <input id="category-all" name="category" type="radio" checked class="h-4 w-4 text-stone-800 focus:ring-stone-500 border-stone-300">
                                <label for="category-all" class="ml-2 text-sm text-stone-600">All</label>
                            </div>
                            <div class="flex items-center">
                                <input id="category-dresses" name="category" type="radio" class="h-4 w-4 text-stone-800 focus:ring-stone-500 border-stone-300">
                                <label for="category-dresses" class="ml-2 text-sm text-stone-600">Dresses</label>
                            </div>
                            <div class="flex items-center">
                                <input id="category-tops" name="category" type="radio" class="h-4 w-4 text-stone-800 focus:ring-stone-500 border-stone-300">
                                <label for="category-tops" class="ml-2 text-sm text-stone-600">Tops</label>
                            </div>
                            <div class="flex items-center">
                                <input id="category-bottoms" name="category" type="radio" class="h-4 w-4 text-stone-800 focus:ring-stone-500 border-stone-300">
                                <label for="category-bottoms" class="ml-2 text-sm text-stone-600">Bottoms</label>
                            </div>
                            <div class="flex items-center">
                                <input id="category-outerwear" name="category" type="radio" class="h-4 w-4 text-stone-800 focus:ring-stone-500 border-stone-300">
                                <label for="category-outerwear" class="ml-2 text-sm text-stone-600">Outerwear</label>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Size Filter -->
                    <div class="mb-6">
                        <h3 class="text-sm font-medium mb-2">Size</h3>
                        <div class="grid grid-cols-4 gap-2">
                            <button class="border border-stone-300 rounded-md py-1 text-sm text-stone-600 hover:border-stone-800 focus:outline-none">XS</button>
                            <button class="border border-stone-300 rounded-md py-1 text-sm text-stone-600 hover:border-stone-800 focus:outline-none">S</button>
                            <button class="border border-stone-300 rounded-md py-1 text-sm text-stone-600 hover:border-stone-800 focus:outline-none">M</button>
                            <button class="border border-stone-300 rounded-md py-1 text-sm text-stone-600 hover:border-stone-800 focus:outline-none">L</button>
                            <button class="border border-stone-300 rounded-md py-1 text-sm text-stone-600 hover:border-stone-800 focus:outline-none">XL</button>
                            <button class="border border-stone-300 rounded-md py-1 text-sm text-stone-600 hover:border-stone-800 focus:outline-none">XXL</button>
                        </div>
                    </div>
                    
                    <!-- Color Filter -->
                    <div class="mb-6">
                        <h3 class="text-sm font-medium mb-2">Color</h3>
                        <div class="flex flex-wrap gap-2">
                            <button class="w-6 h-6 rounded-full bg-black border border-stone-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-stone-500"></button>
                            <button class="w-6 h-6 rounded-full bg-white border border-stone-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-stone-500"></button>
                            <button class="w-6 h-6 rounded-full bg-stone-200 border border-stone-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-stone-500"></button>
                            <button class="w-6 h-6 rounded-full bg-stone-500 border border-stone-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-stone-500"></button>
                            <button class="w-6 h-6 rounded-full bg-stone-700 border border-stone-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-stone-500"></button>
                            <button class="w-6 h-6 rounded-full bg-[#e0c8a8] border border-stone-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-stone-500"></button>
                        </div>
                    </div>
                    
                    <!-- Price Filter -->
                    <div class="mb-6">
                        <h3 class="text-sm font-medium mb-2">Price Range</h3>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <input id="price-all" name="price" type="radio" checked class="h-4 w-4 text-stone-800 focus:ring-stone-500 border-stone-300">
                                <label for="price-all" class="ml-2 text-sm text-stone-600">All</label>
                            </div>
                            <div class="flex items-center">
                                <input id="price-under-100" name="price" type="radio" class="h-4 w-4 text-stone-800 focus:ring-stone-500 border-stone-300">
                                <label for="price-under-100" class="ml-2 text-sm text-stone-600">Under $100</label>
                            </div>
                            <div class="flex items-center">
                                <input id="price-100-200" name="price" type="radio" class="h-4 w-4 text-stone-800 focus:ring-stone-500 border-stone-300">
                                <label for="price-100-200" class="ml-2 text-sm text-stone-600">$100 - $200</label>
                            </div>
                            <div class="flex items-center">
                                <input id="price-over-200" name="price" type="radio" class="h-4 w-4 text-stone-800 focus:ring-stone-500 border-stone-300">
                                <label for="price-over-200" class="ml-2 text-sm text-stone-600">Over $200</label>
                            </div>
                        </div>
                    </div>
                    
                    <button class="w-full bg-stone-800 text-white py-2 rounded-md hover:bg-stone-900 transition duration-150 ease-in-out">Apply Filters</button>
                </div>
            </div>
            
            <!-- Product Grid -->
            <div class="flex-1">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-serif">Women's Collection</h1>
                    <div class="flex items-center">
                        <label for="sort" class="text-sm text-stone-600 mr-2">Sort by:</label>
                        <select id="sort" class="text-sm border-stone-300 rounded-md focus:border-stone-500 focus:ring-stone-500">
                            <option>Featured</option>
                            <option>Newest</option>
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                        </select>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-10">
                    <!-- Product 1 -->
                    <div class="group">
                        <div class="relative overflow-hidden rounded-lg mb-4">
                            <a href="/product/silk-blouse">
                                <img 
                                    src="https://images.unsplash.com/photo-1551163943-3f7253a97449?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                                    alt="Silk Blouse" 
                                    class="w-full h-80 object-cover transition duration-500 group-hover:scale-105"
                                >
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
                            <a href="/product/silk-blouse" class="hover:underline">Silk Blouse</a>
                        </h3>
                        <p class="text-stone-600 mb-2">Elegant design, premium fabric</p>
                        <p class="font-medium">$145.00</p>
                    </div>
                    
                    <!-- Product 2 -->
                    <div class="group">
                        <div class="relative overflow-hidden rounded-lg mb-4">
                            <a href="/product/tailored-trousers">
                                <img 
                                    src="https://images.unsplash.com/photo-1509631179647-0177331693ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=988&q=80" 
                                    alt="Tailored Trousers" 
                                    class="w-full h-80 object-cover transition duration-500 group-hover:scale-105"
                                >
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
                            <a href="/product/tailored-trousers" class="hover:underline">Tailored Trousers</a>
                        </h3>
                        <p class="text-stone-600 mb-2">Classic fit, versatile style</p>
                        <p class="font-medium">$165.00</p>
                    </div>
                    
                    <!-- Product 3 -->
                    <div class="group">
                        <div class="relative overflow-hidden rounded-lg mb-4">
                            <a href="/product/cashmere-sweater">
                                <img 
                                    src="https://images.unsplash.com/photo-1576566588028-4147f3842f27?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1064&q=80" 
                                    alt="Cashmere Sweater" 
                                    class="w-full h-80 object-cover transition duration-500 group-hover:scale-105"
                                >
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
                            <a href="/product/cashmere-sweater" class="hover:underline">Cashmere Sweater</a>
                        </h3>
                        <p class="text-stone-600 mb-2">Soft texture, timeless design</p>
                        <p class="font-medium">$220.00</p>
                    </div>
                    
                    <!-- Product 4 -->
                    <div class="group">
                        <div class="relative overflow-hidden rounded-lg mb-4">
                            <a href="/product/wool-coat">
                                <img 
                                    src="https://images.unsplash.com/photo-1539533018447-63fcce2678e3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=987&q=80" 
                                    alt="Wool Coat" 
                                    class="w-full h-80 object-cover transition duration-500 group-hover:scale-105"
                                >
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
                            <a href="/product/wool-coat" class="hover:underline">Wool Coat</a>
                        </h3>
                        <p class="text-stone-600 mb-2">Warm, elegant outerwear</p>
                        <p class="font-medium">$295.00</p>
                    </div>
                    
                    <!-- Product 5 -->
                    <div class="group">
                        <div class="relative overflow-hidden rounded-lg mb-4">
                            <a href="/product/linen-dress">
                                <img 
                                    src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1020&q=80" 
                                    alt="Linen Dress" 
                                    class="w-full h-80 object-cover transition duration-500 group-hover:scale-105"
                                >
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
                            <a href="/product/linen-dress" class="hover:underline">Linen Dress</a>
                        </h3>
                        <p class="text-stone-600 mb-2">Breathable, elegant silhouette</p>
                        <p class="font-medium">$175.00</p>
                    </div>
                    
                    <!-- Product 6 -->
                    <div class="group">
                        <div class="relative overflow-hidden rounded-lg mb-4">
                            <a href="/product/leather-bag">
                                <img 
                                    src="https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=987&q=80" 
                                    alt="Leather Bag" 
                                    class="w-full h-80 object-cover transition duration-500 group-hover:scale-105"
                                >
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
                            <a href="/product/leather-bag" class="hover:underline">Leather Bag</a>
                        </h3>
                        <p class="text-stone-600 mb-2">Handcrafted, premium leather</p>
                        <p class="font-medium">$195.00</p>
                    </div>
                </div>
                
                <!-- Pagination -->
                <div class="mt-12 flex justify-center">
                    <nav class="flex items-center space-x-2">
                        <a href="#" class="px-3 py-1 rounded-md text-stone-600 hover:bg-stone-100">
                            <span class="sr-only">Previous</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" class="px-3 py-1 rounded-md bg-stone-800 text-white">1</a>
                        <a href="#" class="px-3 py-1 rounded-md text-stone-600 hover:bg-stone-100">2</a>
                        <a href="#" class="px-3 py-1 rounded-md text-stone-600 hover:bg-stone-100">3</a>
                        <span class="px-2 py-1 text-stone-600">...</span>
                        <a href="#" class="px-3 py-1 rounded-md text-stone-600 hover:bg-stone-100">8</a>
                        <a href="#" class="px-3 py-1 rounded-md text-stone-600 hover:bg-stone-100">
                            <span class="sr-only">Next</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

