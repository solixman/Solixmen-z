@extends('client.layout')

@section('title', "Shopping Cart | SOLIXMEN'z")

@section('content')
    <div class="bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <h1 class="text-3xl font-serif mb-8">Shopping Cart</h1>

            <div class="lg:grid lg:grid-cols-12 lg:gap-12">
                <!-- Cart Items -->
                <div class="lg:col-span-8">
                    @if (session()->has('cart') && count(session('cart')) > 0)
                        @php
                            $subtotal = 0;
                        @endphp

                        @foreach (session('cart') as $id => $item)
                            @php
                                $subtotal+=$item['price']*$item['quantity'];
                            @endphp
                            <!-- Cart Item -->
                            <div class="flex flex-col sm:flex-row border-b border-stone-200 py-6">
                                <div class="sm:w-24 sm:h-24 w-full h-40 mb-4 sm:mb-0 flex-shrink-0">
                                    <a href="/product?id={{$id}}">
                                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}"
                                            class="w-full h-full object-cover rounded-md">
                                    </a>
                                </div>
                                <div class="sm:ml-6 flex-1 flex flex-col">
                                    <form action="/cart/save/changes" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$id}}">
                                        
                                        <div class="flex justify-between">
                                            <div>
                                                <a class="text-sm font-medium text-stone-700 hover:text-stone-900" href="/product?id={{$id}}">{{ $item['name'] }}</a>
                                                <div class="flex items-center gap-2 mt-1.5">
                                                    <select name="color"
                                                        class="text-xs border border-stone-300 rounded-md py-1 px-2 bg-white focus:ring-0 focus:border-stone-400">
                                                        <option value="{{ $item['color'] }}" selected>{{ $item['color'] }}</option>
                                                        <option value="Black">Black</option>
                                                        <option value="White">White</option>
                                                        <option value="Navy">Navy</option>
                                                        <option value="Gray">Gray</option>
                                                        <option value="Brown">Brown</option>
                                                    </select>
                                                    <span class="text-sm text-stone-400">/</span>
                                                    <select name="size"
                                                        class="text-xs border border-stone-300 rounded-md py-1 px-2 bg-white focus:ring-0 focus:border-stone-400">
                                                        <option value="{{ $item['size'] }}" selected>{{ $item['size'] }}</option>
                                                        <option value="XS">XS</option>
                                                        <option value="S">S</option>
                                                        <option value="M">M</option>
                                                        <option value="L">L</option>
                                                        <option value="XL">XL</option>
                                                        <option value="XXL">XXL</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <p class="font-medium">${{ number_format($item['price'], 2) }}</p>
                                        </div>
                                        
                                        <div class="mt-4 sm:mt-auto flex items-center justify-between">
                                            <div class="flex items-center gap-3">
                                                <div class="flex border border-stone-300 rounded-md w-24">
                                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1"
                                                        class="w-full text-center border-0 focus:ring-0">
                                                </div>
                                                <button type="submit"
                                                    class="text-xs px-3 py-1.5 bg-stone-800 text-white rounded-md hover:bg-stone-900 transition-colors">
                                                    Save Changes
                                                </button>
                                            </div>
                                            <a class="text-xs text-stone-600 hover:text-stone-900 hover:underline" href="/product/remove/cart?id={{$id}}">Remove</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <!-- Empty Cart Message -->
                        <div class="py-12 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-stone-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            <h2 class="mt-4 text-xl font-medium">Your cart is empty</h2>
                            <p class="mt-2 text-stone-600">Looks like you haven't added any items to your cart yet.</p>
                            <a href="/listing"
                                class="mt-6 inline-block bg-stone-800 text-white py-3 px-6 rounded-md hover:bg-stone-900 transition duration-150 ease-in-out">Continue
                                Shopping</a>
                        </div>
                    @endif

                    <!-- Continue Shopping -->
                    @if (session()->has('cart') && count(session('cart')) > 0)
                        <div class="mt-8">
                            <a href="/listing" class="text-stone-600 hover:text-stone-900 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Continue Shopping
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Order Summary -->
                @if (session()->has('cart') && count(session('cart')) > 0)
                    <div class="lg:col-span-4 mt-12 lg:mt-0">
                        <div class="bg-stone-50 rounded-lg p-6">
                            <h2 class="text-lg font-medium mb-6">Order Summary</h2>

                            <div class="space-y-4">
                                <div class="flex justify-between">
                                    <p class="text-stone-600">Subtotal</p>
                                    <p class="font-medium">${{ number_format($subtotal, 2) }}</p>
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
                                        <p class="font-medium">${{ number_format($subtotal, 2) }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Promo Code -->
                            <div class="mt-6">
                                <label for="promo-code" class="block text-sm font-medium mb-2">Promo Code</label>
                                <div class="flex">
                                    <input type="text" id="promo-code"
                                        class="flex-grow border-stone-300 rounded-l-md focus:border-stone-500 focus:ring-stone-500"
                                        placeholder="Enter code">
                                    <button
                                        class="bg-stone-800 text-white px-4 py-2 rounded-r-md hover:bg-stone-900 transition duration-150 ease-in-out">Apply</button>
                                </div>
                            </div>

                            <!-- Checkout Button -->
                            <div class="mt-6">
                                <form action="/order/create" method="GET">
                                    <button type="submit"
                                        class="block w-full bg-stone-800 text-white text-center py-3 px-6 rounded-md hover:bg-stone-900 transition duration-150 ease-in-out">
                                        Proceed to Checkout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
