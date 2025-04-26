@extends('client.layout')

@section('title', 'Checkout | ELEGANCE')

@section('content')
<!-- Header & Breadcrumb -->
<div class="bg-stone-50 border-b border-stone-200">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <nav class="flex text-sm mb-4">
            <a href="/" class="text-stone-500 hover:text-stone-700">Home</a>
            <span class="mx-2 text-stone-400">/</span>
            <a href="/cart" class="text-stone-500 hover:text-stone-700">Cart</a>
            <span class="mx-2 text-stone-400">/</span>
            <span class="text-stone-800">Checkout</span>
        </nav>
        <h1 class="text-2xl md:text-3xl font-serif text-stone-800">Secure Checkout</h1>
    </div>
</div>

<div class="bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="max-w-4xl mx-auto">
            <!-- Cart Summary -->
            <div class="bg-white border border-stone-200 rounded-lg overflow-hidden shadow-sm mb-8">
                <div class="px-6 py-4 border-b border-stone-200">
                    <h2 class="text-xl font-medium text-stone-800">Order Summary</h2>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-stone-200">
                        <thead class="bg-stone-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-stone-500 uppercase tracking-wider">Product</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-stone-500 uppercase tracking-wider">Price</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-stone-500 uppercase tracking-wider">Quantity</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-stone-500 uppercase tracking-wider">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-stone-200">
                            @foreach($order->order_products as $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-16 w-16 bg-stone-100 rounded overflow-hidden">
                                            <img src="{{ $item->product->image ?? asset('img/placeholder.jpg') }}" alt="{{ $item->product->title }}" class="h-full w-full object-cover">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-stone-800">{{ $item->product->title }}</div>
                                            <div class="text-xs text-stone-500">{{ $item->product->type }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-stone-800">${{ number_format($item->priceAtMoment, 2) }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-stone-800">{{ $item->quantity }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-stone-800">${{ number_format($item->subtotal, 2) }}</div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Order Total -->
                <div class="bg-stone-50 px-6 py-4">
                    @php
                        $subtotal = $order->order_products->sum('subtotal');
                        $shipping = 0; // Assuming free shipping
                        $taxRate = 0.1; // 10% tax rate
                        $tax = $subtotal * $taxRate;
                        $total = $subtotal + $shipping + $tax;
                    @endphp
                    
                    <div class="flex justify-between items-center">
                        <div class="text-sm text-stone-600">Subtotal</div>
                        <div class="text-sm font-medium text-stone-800">${{ number_format($subtotal, 2) }}</div>
                    </div>
                    <div class="flex justify-between items-center mt-2">
                        <div class="text-sm text-stone-600">Shipping</div>
                        <div class="text-sm font-medium text-stone-800">${{ number_format($shipping, 2) }}</div>
                    </div>
                    <div class="flex justify-between items-center mt-2">
                        <div class="text-sm text-stone-600">Tax (10%)</div>
                        <div class="text-sm font-medium text-stone-800">${{ number_format($tax, 2) }}</div>
                    </div>
                    <div class="border-t border-stone-200 my-4"></div>
                    <div class="flex justify-between items-center">
                        <div class="text-base font-medium text-stone-800">Total</div>
                        <div class="text-base font-medium text-stone-800">${{ number_format($total, 2) }}</div>
                    </div>
                </div>
            </div>
            
            <!-- Shipping Information -->
            <div class="bg-white border border-stone-200 rounded-lg overflow-hidden shadow-sm mb-8">
                <div class="px-6 py-4 border-b border-stone-200">
                    <h2 class="text-xl font-medium text-stone-800">Shipping Information</h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-sm font-medium text-stone-800 mb-2">Shipping Address</h3>
                            <address class="not-italic text-sm text-stone-600">
                                {{ Auth::user()->name }}<br>
                                {{ $order->address ?? '123 Elegance Street' }}<br>
                                {{ $order->city ?? 'New York' }}, {{ $order->state ?? 'NY' }} {{ $order->zip ?? '10001' }}<br>
                                {{ $order->country ?? 'United States' }}
                            </address>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-stone-800 mb-2">Shipping Method</h3>
                            <p class="text-sm text-stone-600">Standard Shipping (3-5 business days)</p>
                            <p class="text-sm text-stone-600 mt-1">Free</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Payment Section -->
            <div class="bg-white border border-stone-200 rounded-lg overflow-hidden shadow-sm">
                <div class="px-6 py-4 border-b border-stone-200">
                    <h2 class="text-xl font-medium text-stone-800">Payment Method</h2>
                </div>
                <div class="p-6">
                    <p class="text-sm text-stone-600 mb-6">All transactions are secure and encrypted. Credit card information is never stored on our servers.</p>
                    
                    <form action="/session" method="POST" class="space-y-6">
                        @csrf
                        <input type="hidden" name="total" value="{{ $total }}">
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        
                        <!-- Payment Options -->
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <input id="card" name="paymentMethod" type="radio" checked class="h-4 w-4 text-stone-800 focus:ring-stone-500 border-stone-300">
                                <label for="card" class="ml-3 block text-sm font-medium text-stone-800">
                                    Credit / Debit Card
                                </label>
                            </div>
                            
                            <div class="flex items-center">
                                <input id="paypal" name="paymentMethod" type="radio" class="h-4 w-4 text-stone-800 focus:ring-stone-500 border-stone-300">
                                <label for="paypal" class="ml-3 block text-sm font-medium text-stone-800">
                                    PayPal
                                </label>
                            </div>
                        </div>
                        
                        <!-- Card Logos -->
                        <div class="flex space-x-4">
                            <div class="h-8 w-12 bg-stone-800 rounded flex items-center justify-center text-white text-xs font-bold">VISA</div>
                            <div class="h-8 w-12 bg-stone-800 rounded flex items-center justify-center text-white text-xs font-bold">MC</div>
                            <div class="h-8 w-12 bg-stone-800 rounded flex items-center justify-center text-white text-xs font-bold">AMEX</div>
                            <div class="h-8 w-12 bg-stone-800 rounded flex items-center justify-center text-white text-xs font-bold">DISC</div>
                        </div>
                        
                        <!-- Actions -->
                        <div class="flex flex-col-reverse sm:flex-row justify-between items-center space-y-4 space-y-reverse sm:space-y-0 sm:space-x-4">
                            <a href="{{ url('/cart') }}" class="w-full sm:w-auto inline-flex justify-center items-center px-6 py-3 border border-stone-300 shadow-sm text-sm font-medium rounded-md text-stone-700 bg-white hover:bg-stone-50 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Return to Cart
                            </a>
                            <button type="submit" id="checkout-live-button" class="w-full sm:w-auto inline-flex justify-center items-center px-6 py-3 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-stone-800 hover:bg-stone-900 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Complete Payment (${!! number_format($total, 2) !!})
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Trust Badges -->
            <div class="mt-8 text-center">
                <p class="text-sm text-stone-600 mb-4">We value your trust and security</p>
                <div class="flex justify-center space-x-6">
                    <div class="text-stone-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <div class="text-stone-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <div class="text-stone-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection