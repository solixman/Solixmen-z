@extends('client.layout')

@section('title', 'Cashmere Sweater | ELEGANCE')

@section('content')
    <div class="bg-white">
        <!-- Breadcrumb -->
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <nav class="flex text-sm">
                <a href="/" class="text-stone-500 hover:text-stone-700">Home</a>
                <span class="mx-2 text-stone-400">/</span>
                <a href="/collections" class="text-stone-500 hover:text-stone-700">Collections</a>
                <span class="mx-2 text-stone-400">/</span>
                <a href="/collections/women" class="text-stone-500 hover:text-stone-700">Women</a>
                <span class="mx-2 text-stone-400">/</span>
                <span class="text-stone-800">Cashmere Sweater</span>
            </nav>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Product Images -->
                <div>
                    <div class="mb-4 overflow-hidden rounded-lg">
                        <img src="{{ $product->image }}" alt="{{ $product->titre }}" class="w-full h-auto object-cover"
                            id="main-image">
                    </div>
                    <div class="grid grid-cols-4 gap-4">
                        <button class="overflow-hidden rounded-lg border-2 border-stone-800">
                            <img src="{{ $product->image }}" alt="{{ $product->titre }}" class="w-full h-24 object-cover"
                                onclick="document.getElementById('main-image').src = this.src">
                        </button>

                    </div>
                </div>

                <!-- Product Info -->
                <div>
                    <h1 class="text-3xl font-serif mb-2">{{ $product->titre }}</h1>
                    <p class="text-2xl font-medium mb-4">{{ $product->price }}</p>

                    <div class="flex items-center mb-4">
                        <div class="flex text-stone-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                            </svg>
                        </div>
                        <span class="ml-2 text-sm text-stone-600">42 reviews</span>
                    </div>

                    <div class="mb-6">
                        <p class="text-stone-600">{{ $product->description }}</p>
                    </div>
                    <form action="/product/add/cart" method="get">
                        @csrf
                        <!-- Color Selection -->
                        <div class="mb-6">
                            <h3 class="text-sm font-medium mb-2">Color: <span id="selected-color">Stone</span></h3>
                            <input type="hidden" name="color" value="Stone" id="selected-color-input">
                            <div class="flex flex-wrap gap-2">
                                <button
                                    class="w-10 h-10 rounded-full bg-stone-500 border-2 border-stone-800 focus:outline-none"
                                    onclick="document.getElementById('selected-color').textContent = 'Stone'; document.getElementById('selected-color-input').value = 'Stone'" type="button"></button>
                                <button
                                    class="w-10 h-10 rounded-full bg-stone-700 border border-stone-300 focus:outline-none focus:border-stone-800"
                                    onclick="document.getElementById('selected-color').textContent = 'Charcoal';document.getElementById('selected-color-input').value = 'Charcoal'" type="button"></button>
                                <button
                                    class="w-10 h-10 rounded-full bg-[#e0c8a8] border border-stone-300 focus:outline-none focus:border-stone-800"
                                    onclick="document.getElementById('selected-color').textContent = 'Camel';document.getElementById('selected-color-input').value = 'Camel'" type="button"></button>
                                <button
                                    class="w-10 h-10 rounded-full bg-stone-200 border border-stone-300 focus:outline-none focus:border-stone-800"
                                    onclick="document.getElementById('selected-color').textContent = 'Ivory';document.getElementById('selected-color-input').value = 'Ivory'" type="button"></button>
                                <button
                                    class="w-10 h-10 rounded-full bg-black border border-stone-300 focus:outline-none focus:border-stone-800"
                                    onclick="document.getElementById('selected-color').textContent = 'Black';document.getElementById('selected-color-input').value = 'Black'" type="button"></button>
                            </div>
                        </div>

                        <!-- Size Selection -->
                        
                        <div class="mb-6">
                            <div class="flex justify-between items-center mb-2">
                                <h3 class="text-sm font-medium">Size: <span id="selected-size">M</span></h3>
                                <button class="text-sm text-stone-600 underline">Size Guide</button>
                            </div>
                            <input type="text" name="size" value="M" id="selected-size-input">
                            <div class="grid grid-cols-5 gap-2">
                                <button 
                                    class="border border-stone-300 rounded-md py-2 text-sm text-stone-600 hover:border-stone-800 focus:outline-none focus:border-stone-800"
                                    onclick="document.getElementById('selected-size').textContent = 'XS';
                                    document.getElementById('selected-size-input').value = 'XS'" type="button">XS</button>
                                <button
                                    class="border border-stone-300 rounded-md py-2 text-sm text-stone-600 hover:border-stone-800 focus:outline-none focus:border-stone-800"
                                    onclick="document.getElementById('selected-size').textContent = 'S';
                                    document.getElementById('selected-size-input').value = 'S'" type="button">S</button>
                                <button
                                    class="border-2 border-stone-800 rounded-md py-2 text-sm font-medium text-stone-800 focus:outline-none"
                                    onclick="document.getElementById('selected-size').textContent = 'M';
                                    document.getElementById('selected-size-input').value = 'M'" type="button">M</button>
                                <button
                                    class="border border-stone-300 rounded-md py-2 text-sm text-stone-600 hover:border-stone-800 focus:outline-none focus:border-stone-800"
                                    onclick="document.getElementById('selected-size').textContent = 'L';
                                    document.getElementById('selected-size-input').value = 'L'" type="button">L</button>
                                <button
                                    class="border border-stone-300 rounded-md py-2 text-sm text-stone-600 hover:border-stone-800 focus:outline-none focus:border-stone-800"
                                    onclick="document.getElementById('selected-size').textContent = 'XL';
                                    document.getElementById('selected-size-input').value = 'XL'" type="button">XL</button>
                            </div>
                        </div>
                           <input type="hidden" name="id" value="{{$product->id}}" >
                        <!-- Quantity -->
                        <div class="mb-6">
                            <h3 class="text-sm font-medium mb-2">Quantity</h3>
                            <div class="flex border border-stone-300 rounded-md w-32">
                                <button type="button" class="px-3 py-2 text-stone-600 hover:text-stone-900 focus:outline-none"
                                    onclick="decrementQuantity()">-</button>
                                <input type="number" id="quantity" name="quantity" value="1" min="1"
                                    class="w-full text-center border-0 focus:ring-0" readonly>
                                <button type="button" class="px-3 py-2 text-stone-600 hover:text-stone-900 focus:outline-none"
                                    onclick="incrementQuantity()">+</button>
                            </div>
                        </div>

                        <!-- Add to Cart -->
                        <div class="flex flex-col sm:flex-row gap-4 mb-8">
                            <button type="submit"
                                class="flex-1 bg-stone-800 text-white py-3 px-6 rounded-md hover:bg-stone-900 transition duration-150 ease-in-out">Add
                                to Cart</button>
                            <button
                                class="flex items-center justify-center border border-stone-300 rounded-md p-3 hover:border-stone-800 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-stone-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                        </div>
                    </form>

                    <!-- Product Details -->
                    <div class="border-t border-stone-200 pt-6">
                        <button class="flex justify-between items-center w-full py-3 text-left focus:outline-none"
                            onclick="toggleDetails('material')">
                            <span class="font-medium">Material & Care</span>
                            <svg id="material-icon" xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 transform transition-transform" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div id="material-details" class="pb-3 text-stone-600 hidden">
                            <ul class="list-disc pl-5 space-y-1">
                                <li>100% Grade A Mongolian cashmere</li>
                                <li>Dry clean only</li>
                                <li>Cool iron if needed</li>
                                <li>Do not bleach</li>
                                <li>Store folded in a drawer or on a shelf</li>
                            </ul>
                        </div>

                        <div class="border-t border-stone-200"></div>

                        <button class="flex justify-between items-center w-full py-3 text-left focus:outline-none"
                            onclick="toggleDetails('shipping')">
                            <span class="font-medium">Shipping & Returns</span>
                            <svg id="shipping-icon" xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 transform transition-transform" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div id="shipping-details" class="pb-3 text-stone-600 hidden">
                            <p class="mb-2">Free standard shipping on all orders over $100.</p>
                            <p class="mb-2">Express shipping available at checkout.</p>
                            <p>Returns accepted within 30 days of delivery. Item must be unworn, unwashed, and with original
                                tags attached.</p>
                        </div>

                        <div class="border-t border-stone-200"></div>

                        <button class="flex justify-between items-center w-full py-3 text-left focus:outline-none"
                            onclick="toggleDetails('dimensions')">
                            <span class="font-medium">Dimensions & Fit</span>
                            <svg id="dimensions-icon" xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 transform transition-transform" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div id="dimensions-details" class="pb-3 text-stone-600 hidden">
                            <p class="mb-2">Relaxed fit. Model is 5'9" and wearing size S.</p>
                            <p>For detailed measurements, please refer to our size guide.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- You May Also Like -->
            <div class="mt-16 border-t border-stone-200 pt-12">
                <h2 class="text-2xl font-serif mb-8">You May Also Like</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Related Product 1 -->
                    <div class="group">
                        <div class="relative overflow-hidden rounded-lg mb-4">
                            <a href="/product/wool-cardigan">
                                <img src="https://images.unsplash.com/photo-1434389677669-e08b4cac3105?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1005&q=80"
                                    alt="Wool Cardigan"
                                    class="w-full h-72 object-cover transition duration-500 group-hover:scale-105">
                            </a>
                            <div
                                class="absolute inset-0 bg-stone-900/0 group-hover:bg-stone-900/10 transition duration-300">
                            </div>
                            <div
                                class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 bg-white bg-opacity-90">
                                <button
                                    class="w-full py-2 bg-stone-800 text-white hover:bg-stone-900 transition duration-150 ease-in-out rounded">Add
                                    to Cart</button>
                            </div>
                        </div>
                        <h3 class="font-medium mb-1">
                            <a href="/product/wool-cardigan" class="hover:underline">Wool Cardigan</a>
                        </h3>
                        <p class="text-stone-600 mb-2">Cozy layering piece</p>
                        <p class="font-medium">$185.00</p>
                    </div>

                    <!-- Related Product 2 -->
                    <div class="group">
                        <div class="relative overflow-hidden rounded-lg mb-4">
                            <a href="/product/turtleneck-sweater">
                                <img src="https://images.unsplash.com/photo-1608234807905-4466023792f5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80"
                                    alt="Turtleneck Sweater"
                                    class="w-full h-72 object-cover transition duration-500 group-hover:scale-105">
                            </a>
                            <div
                                class="absolute inset-0 bg-stone-900/0 group-hover:bg-stone-900/10 transition duration-300">
                            </div>
                            <div
                                class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 bg-white bg-opacity-90">
                                <button
                                    class="w-full py-2 bg-stone-800 text-white hover:bg-stone-900 transition duration-150 ease-in-out rounded">Add
                                    to Cart</button>
                            </div>
                        </div>
                        <h3 class="font-medium mb-1">
                            <a href="/product/turtleneck-sweater" class="hover:underline">Turtleneck Sweater</a>
                        </h3>
                        <p class="text-stone-600 mb-2">Elegant neckline design</p>
                        <p class="font-medium">$195.00</p>
                    </div>

                    <!-- Related Product 3 -->
                    <div class="group">
                        <div class="relative overflow-hidden rounded-lg mb-4">
                            <a href="/product/merino-pullover">
                                <img src="https://images.unsplash.com/photo-1586078130702-d208859b6223?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=987&q=80"
                                    alt="Merino Pullover"
                                    class="w-full h-72 object-cover transition duration-500 group-hover:scale-105">
                            </a>
                            <div
                                class="absolute inset-0 bg-stone-900/0 group-hover:bg-stone-900/10 transition duration-300">
                            </div>
                            <div
                                class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 bg-white bg-opacity-90">
                                <button
                                    class="w-full py-2 bg-stone-800 text-white hover:bg-stone-900 transition duration-150 ease-in-out rounded">Add
                                    to Cart</button>
                            </div>
                        </div>
                        <h3 class="font-medium mb-1">
                            <a href="/product/merino-pullover" class="hover:underline">Merino Pullover</a>
                        </h3>
                        <p class="text-stone-600 mb-2">Lightweight warmth</p>
                        <p class="font-medium">$165.00</p>
                    </div>

                    <!-- Related Product 4 -->
                    <div class="group">
                        <div class="relative overflow-hidden rounded-lg mb-4">
                            <a href="/product/cashmere-scarf">
                                <img src="https://images.unsplash.com/photo-1520903920243-00d872a2d1c9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=987&q=80"
                                    alt="Cashmere Scarf"
                                    class="w-full h-72 object-cover transition duration-500 group-hover:scale-105">
                            </a>
                            <div
                                class="absolute inset-0 bg-stone-900/0 group-hover:bg-stone-900/10 transition duration-300">
                            </div>
                            <div
                                class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 bg-white bg-opacity-90">
                                <button
                                    class="w-full py-2 bg-stone-800 text-white hover:bg-stone-900 transition duration-150 ease-in-out rounded">Add
                                    to Cart</button>
                            </div>
                        </div>
                        <h3 class="font-medium mb-1">
                            <a href="/product/cashmere-scarf" class="hover:underline">Cashmere Scarf</a>
                        </h3>
                        <p class="text-stone-600 mb-2">Luxurious accessory</p>
                        <p class="font-medium">$120.00</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleDetails(id) {
            const details = document.getElementById(id + '-details');
            const icon = document.getElementById(id + '-icon');

            if (details.classList.contains('hidden')) {
                details.classList.remove('hidden');
                icon.classList.add('rotate-180');
            } else {
                details.classList.add('hidden');
                icon.classList.remove('rotate-180');
            }
        }

        function incrementQuantity() {
            const input = document.getElementById('quantity');
            input.value = parseInt(input.value) + 1;
        }

        function decrementQuantity() {
            const input = document.getElementById('quantity');
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
            }
        }
    </script>
@endsection
