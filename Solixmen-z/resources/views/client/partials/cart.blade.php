@extends('client.layout')

@section('title', 'Shopping Cart | SOLIXMEN-z')

@section('content')
<div class="bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-serif mb-8">Shopping Cart</h1>
        
        <div class="lg:grid lg:grid-cols-12 lg:gap-12">
            <!-- Cart Items -->
            <div class="lg:col-span-8">
                <!-- Cart Item 1 -->
                <div class="flex flex-col sm:flex-row border-b border-stone-200 py-6">
                    <div class="sm:w-24 sm:h-24 w-full h-40 mb-4 sm:mb-0 flex-shrink-0">
                        <img 
                            src="https://images.unsplash.com/photo-1576566588028-4147f3842f27?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1064&q=80" 
                            alt="Cashmere Sweater" 
                            class="w-full h-full object-cover rounded-md"
                        >
                    </div>
                    <div class="sm:ml-6 flex-1 flex flex-col">
                        <div class="flex justify-between">
                            <div>
                                <h3 class="font-medium">Cashmere Sweater</h3>
                                <p class="text-sm text-stone-600 mt-1">Stone / M</p>
                            </div>
                            <p class="font-medium">$220.00</p>
                        </div>
                        <div class="mt-4 sm:mt-auto flex items-center justify-between">
                            <div class="flex border border-stone-300 rounded-md w-24">
                                <button class="px-2 py-1 text-stone-600 hover:text-stone-900 focus:outline-none">-</button>
                                <input type="number" value="1" min="1" class="w-full text-center border-0 focus:ring-0" readonly>
                                <button class="px-2 py-1 text-stone-600 hover:text-stone-900 focus:outline-none">+</button>
                            </div>
                            <button class="text-sm text-stone-600 hover:text-stone-900">Remove</button>
                        </div>
                    </div>
                </div>
                
                <!-- Cart Item 2 -->
                <div class="flex flex-col sm:flex-row border-b border-stone-200 py-6">
                    <div class="sm:w-24 sm:h-24 w-full h-40 mb-4 sm:mb-0 flex-shrink-0">
                        <img 
                            src="https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=987&q=80" 
                            alt="Leather Bag" 
                            class="w-full h-full object-cover rounded-md"
                        >
                    </div>
                    <div class="sm:ml-6 flex-1 flex flex-col">
                        <div class="flex justify-between">
                            <div>
                                <h3 class="font-medium">Leather Bag</h3>
                                <p class="text-sm text-stone-600 mt-1">Black</p>
                            </div>
                            <p class="font-medium">$195.00</p>
                        </div>
                        <div class="mt-4 sm:mt-auto flex items-center justify-between">
                            <div class="flex border border-stone-300 rounded-md w-24">
                                <button class="px-2 py-1 text-stone-600 hover:text-stone-900 focus:outline-none">-</button>
                                <input type="number" value="1" min="1" class="w-full text-center border-0 focus:ring-0" readonly>
                                <button class="px-2 py-1 text-stone-600 hover:text-stone-900 focus:outline-none">+</button>
                            </div>
                            <button class="text-sm text-stone-600 hover:text-stone-900">Remove</button>
                        </div>
                    </div>
                </div>
                
                <!-- Empty Cart Message (hidden when cart has items) -->
                <div class="hidden py-12 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-stone-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <h2 class="mt-4 text-xl font-medium">Your cart is empty</h2>
                    <p class="mt-2 text-stone-600">Looks like you haven't added any items to your cart yet.</p>
                    <a href="/collections" class="mt-6 inline-block bg-stone-800 text-white py-3 px-6 rounded-md hover:bg-stone-900 transition duration-150 ease-in-out">Continue Shopping</a>
                </div>
                
                <!-- Continue Shopping -->
                <div class="mt-8">
                    <a href="/collections" class="text-stone-600 hover:text-stone-900 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Continue Shopping
                    </a>
                </div>
            </div>
            
            <!-- Order Summary -->
            <div class="lg:col-span-4 mt-12 lg:mt-0">
                <div class="bg-stone-50 rounded-lg p-6">
                    <h2 class="text-lg font-medium mb-6">Order Summary</h2>
                    
                    <div class="space-y-4">
                        <div class="flex justify-between">
                            <p class="text-stone-600">Subtotal</p>
                            <p class="font-medium">$415.00</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="text-stone-600">Shipping</p>
                            <p class="font-medium">Calculated at checkout</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="text-stone-600">Tax</p>
                            <p class="font-medium">Calculated at checkout</p>
                        </div>
                        
                        <div class="border-t border-stone-200 my-4 pt-4">
                            <div class="flex justify-between">
                                <p class="font-medium">Total</p>
                                <p class="font-medium">$415.00</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Promo Code -->
                    <div class="mt-6">
                        <label for="promo-code" class="block text-sm font-medium mb-2">Promo Code</label>
                        <div class="flex">
                            <input 
                                type="text" 
                                id="promo-code" 
                                class="flex-grow border-stone-300 rounded-l-md focus:border-stone-500 focus:ring-stone-500"
                                placeholder="Enter code"
                            >
                            <button class="bg-stone-800 text-white px-4 py-2 rounded-r-md hover:bg-stone-900 transition duration-150 ease-in-out">Apply</button>
                        </div>
                    </div>
                    
                    <!-- Checkout Button -->
                    <div class="mt-6">
                        <a 
                            href="/checkout" 
                            class="block w-full bg-stone-800 text-white text-center py-3 px-6 rounded-md hover:bg-stone-900 transition duration-150 ease-in-out"
                        >
                            Proceed to Checkout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

