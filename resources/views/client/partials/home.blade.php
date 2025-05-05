@extends('client.layout')

@section('title', "SOLIXMEN'z - Timeless Fashion for the Modern Individual")

@section('content')
<div>
    <!-- Hero Section -->
    <div class="bg-yellow-200 text-stone-900 py-2 text-center">
        <div class="container mx-auto px-4">
            <h3>
              Sold coming soon
                {{-- <span class="block md:inline">Plus, get an extra 10% off– only on the app*</span> --}}
            </h3>
        </div>
    </div>
    <section class="relative">
        <div class="relative h-[70vh] overflow-hidden">
            <img 
                src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                alt="Elegant clothing collection" 
                class="absolute inset-0 w-full h-full object-cover"
            >
            <div class="absolute inset-0 bg-stone-900/30"></div>
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="text-center text-white px-4 sm:px-6 max-w-3xl">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-serif font-medium mb-4">Timeless ELEGANCE</h1>
                    <p class="text-lg md:text-xl mb-8">Discover our new collection of sophisticated designs crafted for the modern individual</p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="/listing" class="bg-transparent border border-white text-white hover:bg-white/10 px-6 py-3 rounded-md font-medium transition duration-150 ease-in-out">Explore Products</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Featured Categories -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-serif text-center mb-12">Shop by Category</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Women's Category -->
                <div class="relative group overflow-hidden rounded-lg">
                    <img 
                        src="https://images.unsplash.com/photo-1581044777550-4cfa60707c03?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=986&q=80" 
                        alt="Women's Collection" 
                        class="w-full h-96 object-cover transition duration-500 group-hover:scale-105"
                    >
                    <div class="absolute inset-0 bg-stone-900/20 group-hover:bg-stone-900/40 transition duration-300"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <a href="/listing?categorie=women" class="bg-white text-stone-800 hover:bg-stone-100 px-6 py-3 rounded-md font-medium transition duration-150 ease-in-out">Women</a>
                    </div>
                </div>
                
                <!-- Men's Category -->
                <div class="relative group overflow-hidden rounded-lg">
                    <img 
                        src="https://images.unsplash.com/photo-1617137968427-85924c800a22?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=987&q=80" 
                        alt="Men's Collection" 
                        class="w-full h-96 object-cover transition duration-500 group-hover:scale-105"
                    >
                    <div class="absolute inset-0 bg-stone-900/20 group-hover:bg-stone-900/40 transition duration-300"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <a href="listing?categorie=men" class="bg-white text-stone-800 hover:bg-stone-100 px-6 py-3 rounded-md font-medium transition duration-150 ease-in-out">Men</a>
                    </div>
                </div>
                
                <!-- Accessories Category -->
                <div class="relative group overflow-hidden rounded-lg">
                    <img 
                        src="https://images.unsplash.com/photo-1584917865442-de89df76afd3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1035&q=80" 
                        alt="Accessories Collection" 
                        class="w-full h-96 object-cover transition duration-500 group-hover:scale-105"
                    >
                    <div class="absolute inset-0 bg-stone-900/20 group-hover:bg-stone-900/40 transition duration-300"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <a href="/listing?categorie=accessories" class="bg-white text-stone-800 hover:bg-stone-100 px-6 py-3 rounded-md font-medium transition duration-150 ease-in-out">Accessories</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- New Arrivals -->
    <section class="py-16 bg-stone-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-12">
                <h2 class="text-3xl font-serif">New Arrivals</h2>
                <a href="/listing" class="text-stone-600 hover:text-stone-900 font-medium">View All</a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Product Card 1 -->
                {{-- <div class="group">
                    <div class="relative overflow-hidden rounded-lg mb-4">
                        <img 
                            src="https://images.unsplash.com/photo-1525507119028-ed4c629a60a3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1035&q=80" 
                            alt="Tailored Wool Blazer" 
                            class="w-full h-80 object-cover transition duration-500 group-hover:scale-105"
                        >
                        <div class="absolute inset-0 bg-stone-900/0 group-hover:bg-stone-900/10 transition duration-300"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 bg-white bg-opacity-90">
                            <button class="w-full py-2 bg-stone-800 text-white hover:bg-stone-900 transition duration-150 ease-in-out rounded">Add to Cart</button>
                        </div>
                    </div>
                    <h3 class="font-medium mb-1">Tailored Wool Blazer</h3>
                    <p class="text-stone-600 mb-2">Classic fit, premium fabric</p>
                    <p class="font-medium">$189.00</p>
                </div>
                
                <!-- Product Card 2 -->
                <div class="group">
                    <div class="relative overflow-hidden rounded-lg mb-4">
                        <img 
                            src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1020&q=80" 
                            alt="Silk Midi Dress" 
                            class="w-full h-80 object-cover transition duration-500 group-hover:scale-105"
                        >
                        <div class="absolute inset-0 bg-stone-900/0 group-hover:bg-stone-900/10 transition duration-300"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 bg-white bg-opacity-90">
                            <button class="w-full py-2 bg-stone-800 text-white hover:bg-stone-900 transition duration-150 ease-in-out rounded">Add to Cart</button>
                        </div>
                    </div>
                    <h3 class="font-medium mb-1">Silk Midi Dress</h3>
                    <p class="text-stone-600 mb-2">Elegant drape, natural fabric</p>
                    <p class="font-medium">$165.00</p>
                </div>
                
                <!-- Product Card 3 -->
                <div class="group">
                    <div class="relative overflow-hidden rounded-lg mb-4">
                        <img 
                            src="https://images.unsplash.com/photo-1521223890158-f9f7c3d5d504?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=992&q=80" 
                            alt="Cashmere Sweater" 
                            class="w-full h-80 object-cover transition duration-500 group-hover:scale-105"
                        >
                        <div class="absolute inset-0 bg-stone-900/0 group-hover:bg-stone-900/10 transition duration-300"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 bg-white bg-opacity-90">
                            <button class="w-full py-2 bg-stone-800 text-white hover:bg-stone-900 transition duration-150 ease-in-out rounded">Add to Cart</button>
                        </div>
                    </div>
                    <h3 class="font-medium mb-1">Cashmere Sweater</h3>
                    <p class="text-stone-600 mb-2">Soft texture, timeless design</p>
                    <p class="font-medium">$220.00</p>
                </div>
                
                <!-- Product Card 4 -->
                <div class="group">
                    <div class="relative overflow-hidden rounded-lg mb-4">
                        <img 
                            src="https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=987&q=80" 
                            alt="Leather Tote Bag" 
                            class="w-full h-80 object-cover transition duration-500 group-hover:scale-105"
                        >
                        <div class="absolute inset-0 bg-stone-900/0 group-hover:bg-stone-900/10 transition duration-300"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 bg-white bg-opacity-90">
                            <button class="w-full py-2 bg-stone-800 text-white hover:bg-stone-900 transition duration-150 ease-in-out rounded">Add to Cart</button>
                        </div>
                    </div>
                    <h3 class="font-medium mb-1">Leather Tote Bag</h3>
                    <p class="text-stone-600 mb-2">Handcrafted, premium leather</p>
                    <p class="font-medium">$175.00</p>
                </div> --}}
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
                    @php
                    @endphp
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
            </div>
        </div>
    </section>
    
    {{-- <!-- Testimonials -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-serif text-center mb-12">What Our Customers Say</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-stone-50 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="text-stone-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-stone-600 mb-4">"The quality of their clothing is exceptional. I've been a customer for years and have never been disappointed. Their pieces are timeless and last for years."</p>
                    <div class="font-medium">Emily Johnson</div>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="bg-stone-50 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="text-stone-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-stone-600 mb-4">"I appreciate their commitment to sustainability. It's rare to find a brand that combines style, quality, and ethical practices so seamlessly."</p>
                    <div class="font-medium">Michael Roberts</div>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="bg-stone-50 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="text-stone-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-stone-600 mb-4">"The customer service is outstanding. When I had an issue with my order, they resolved it immediately and went above and beyond to ensure I was satisfied."</p>
                    <div class="font-medium">Sophia Chen</div>
                </div>
            </div>
        </div>
    </section>
     --}}
    <!-- Newsletter -->
    {{-- <section class="py-16 bg-stone-100">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl font-serif mb-4">Join Our Community</h2>
                <p class="text-stone-600 mb-8">Subscribe to receive updates on new arrivals, special offers, and styling tips.</p>
                <form class="flex flex-col sm:flex-row gap-2 max-w-md mx-auto">
                    <input 
                        type="email" 
                        placeholder="Your email address" 
                        class="flex-grow px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md"
                        required
                    >
                    <button 
                        type="submit" 
                        class="bg-stone-800 hover:bg-stone-900 text-white px-6 py-2 rounded-md transition duration-150 ease-in-out"
                    >
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    </section> --}}
</div>
@endsection

