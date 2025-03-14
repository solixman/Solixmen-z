@extends('client.layout')

@section('title', 'Checkout | ELEGANCE')

@section('content')
<div class="bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-serif mb-8">Checkout</h1>
        
        <div class="lg:grid lg:grid-cols-12 lg:gap-12">
            <!-- Checkout Form -->
            <div class="lg:col-span-8">
                <form>
                    <!-- Contact Information -->
                    <div class="mb-8">
                        <h2 class="text-lg font-medium mb-4">Contact Information</h2>
                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label for="email" class="block text-sm font-medium mb-1">Email Address</label>
                                <input 
                                    type="email" 
                                    id="email" 
                                    class="w-full border-stone-300 border-2 rounded-md bg-stone-50 shadow-sm focus:border-stone-500 focus:ring-stone-500 focus:shadow-md transition-all duration-200"
                                    required
                                >
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium mb-1">Phone Number</label>
                                <input 
                                    type="tel" 
                                    id="phone" 
                                    class="w-full border-stone-300 border-2 rounded-md bg-stone-50 shadow-sm focus:border-stone-500 focus:ring-stone-500 focus:shadow-md transition-all duration-200"
                                    required
                                >
                            </div>
                        </div>
                    </div>
                    
                    <!-- Shipping Address -->
                    <div class="mb-8">
                        <h2 class="text-lg font-medium mb-4">Shipping Address</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="first-name" class="block text-sm font-medium mb-1">First Name</label>
                                <input 
                                    type="text" 
                                    id="first-name" 
                                    class="w-full border-stone-300 border-2 rounded-md bg-stone-50 shadow-sm focus:border-stone-500 focus:ring-stone-500 focus:shadow-md transition-all duration-200"
                                    required
                                >
                            </div>
                            <div>
                                <label for="last-name" class="block text-sm font-medium mb-1">Last Name</label>
                                <input 
                                    type="text" 
                                    id="last-name" 
                                    class="w-full border-stone-300 border-2 rounded-md bg-stone-50 shadow-sm focus:border-stone-500 focus:ring-stone-500 focus:shadow-md transition-all duration-200"
                                    required
                                >
                            </div>
                            <div class="sm:col-span-2">
                                <label for="address" class="block text-sm font-medium mb-1">Address</label>
                                <input 
                                    type="text" 
                                    id="address" 
                                    class="w-full border-stone-300 border-2 rounded-md bg-stone-50 shadow-sm focus:border-stone-500 focus:ring-stone-500 focus:shadow-md transition-all duration-200"
                                    required
                                >
                            </div>
                            <div class="sm:col-span-2">
                                <label for="apartment" class="block text-sm font-medium mb-1">Apartment, suite, etc. (optional)</label>
                                <input 
                                    type="text" 
                                    id="apartment" 
                                    class="w-full border-stone-300 border-2 rounded-md bg-stone-50 shadow-sm focus:border-stone-500 focus:ring-stone-500 focus:shadow-md transition-all duration-200"
                                >
                            </div>
                            <div>
                                <label for="city" class="block text-sm font-medium mb-1">City</label>
                                <input 
                                    type="text" 
                                    id="city" 
                                    class="w-full border-stone-300 border-2 rounded-md bg-stone-50 shadow-sm focus:border-stone-500 focus:ring-stone-500 focus:shadow-md transition-all duration-200"
                                    required
                                >
                            </div>
                            <div>
                                <label for="country" class="block text-sm font-medium mb-1">Country</label>
                                <select 
                                    id="country" 
                                    class="w-full border-stone-300 border-2 rounded-md bg-stone-50 shadow-sm focus:border-stone-500 focus:ring-stone-500 focus:shadow-md transition-all duration-200"
                                    required
                                >
                                    <option value="">Select Country</option>
                                    <option value="US">United States</option>
                                    <option value="CA">Canada</option>
                                    <option value="UK">United Kingdom</option>
                                    <option value="AU">Australia</option>
                                </select>
                            </div>
                            <div>
                                <label for="state" class="block text-sm font-medium mb-1">State / Province</label>
                                <input 
                                    type="text" 
                                    id="state" 
                                    class="w-full border-stone-300 border-2 rounded-md bg-stone-50 shadow-sm focus:border-stone-500 focus:ring-stone-500 focus:shadow-md transition-all duration-200"
                                    required
                                >
                            </div>
                            <div>
                                <label for="postal-code" class="block text-sm font-medium mb-1">Postal Code</label>
                                <input 
                                    type="text" 
                                    id="postal-code" 
                                    class="w-full border-stone-300 border-2 rounded-md bg-stone-50 shadow-sm focus:border-stone-500 focus:ring-stone-500 focus:shadow-md transition-all duration-200"
                                    required
                                >
                            </div>
                        </div>
                    </div>
                    
                    <!-- Shipping Method -->
                    <div class="mb-8">
                        <h2 class="text-lg font-medium mb-4">Shipping Method</h2>
                        <div class="space-y-3">
                            <div class="flex items-center border border-stone-300 rounded-md p-4">
                                <input 
                                    type="radio" 
                                    id="standard-shipping" 
                                    name="shipping-method" 
                                    value="standard" 
                                    class="h-4 w-4 text-stone-800 focus:ring-stone-500 border-stone-300 border-2 shadow-sm"
                                    checked
                                >
                                <label for="standard-shipping" class="ml-3 flex flex-1 justify-between">
                                    <span class="font-medium">Standard Shipping (3-5 business days)</span>
                                    <span>Free</span>
                                </label>
                            </div>
                            <div class="flex items-center border border-stone-300 rounded-md p-4">
                                <input 
                                    type="radio" 
                                    id="express-shipping" 
                                    name="shipping-method" 
                                    value="express" 
                                    class="h-4 w-4 text-stone-800 focus:ring-stone-500 border-stone-300 border-2 shadow-sm"
                                >
                                <label for="express-shipping" class="ml-3 flex flex-1 justify-between">
                                    <span class="font-medium">Express Shipping (1-2 business days)</span>
                                    <span>$15.00</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Payment Information -->
                    <div class="mb-8">
                        <h2 class="text-lg font-medium mb-4">Payment Information</h2>
                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label for="card-number" class="block text-sm font-medium mb-1">Card Number</label>
                                <input 
                                    type="text" 
                                    id="card-number" 
                                    class="w-full border-stone-300 border-2 rounded-md bg-stone-50 shadow-sm focus:border-stone-500 focus:ring-stone-500 focus:shadow-md transition-all duration-200"
                                    placeholder="1234 5678 9012 3456"
                                    required
                                >
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="expiration" class="block text-sm font-medium mb-1">Expiration Date</label>
                                    <input 
                                        type="text" 
                                        id="expiration" 
                                        class="w-full border-stone-300 border-2 rounded-md bg-stone-50 shadow-sm focus:border-stone-500 focus:ring-stone-500 focus:shadow-md transition-all duration-200"
                                        placeholder="MM / YY"
                                        required
                                    >
                                </div>
                                <div>
                                    <label for="cvv" class="block text-sm font-medium mb-1">CVV</label>
                                    <input 
                                        type="text" 
                                        id="cvv" 
                                        class="w-full border-stone-300 border-2 rounded-md bg-stone-50 shadow-sm focus:border-stone-500 focus:ring-stone-500 focus:shadow-md transition-all duration-200"
                                        placeholder="123"
                                        required
                                    >
                                </div>
                            </div>
                            <div>
                                <label for="name-on-card" class="block text-sm font-medium mb-1">Name on Card</label>
                                <input 
                                    type="text" 
                                    id="name-on-card" 
                                    class="w-full border-stone-300 border-2 rounded-md bg-stone-50 shadow-sm focus:border-stone-500 focus:ring-stone-500 focus:shadow-md transition-all duration-200"
                                    required
                                >
                            </div>
                        </div>
                    </div>
                    
                    <!-- Billing Address -->
                    <div class="mb-8">
                        <div class="flex items-center mb-4">
                            <input 
                                type="checkbox" 
                                id="same-address" 
                                class="h-4 w-4 text-stone-800 focus:ring-stone-500 border-stone-300 border-2 shadow-sm"
                                checked
                            >
                            <label for="same-address" class="ml-2 text-sm">Billing address is the same as shipping address</label>
                        </div>
                        
                        <!-- Billing address form fields would go here, hidden by default -->
                        <div id="billing-address-fields" class="hidden">
                            <!-- Duplicate of shipping address fields -->
                        </div>
                    </div>
                    
                    <!-- Place Order Button -->
                    <div class="mt-8">
                        <button 
                            type="submit" 
                            class="w-full bg-stone-800 text-white py-3 px-6 rounded-md hover:bg-stone-900 transition duration-150 ease-in-out"
                        >
                            Place Order
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Order Summary -->
            <div class="lg:col-span-4 mt-12 lg:mt-0">
                <div class="bg-stone-50 rounded-lg p-6 sticky top-24">
                    <h2 class="text-lg font-medium mb-6">Order Summary</h2>
                    
                    <!-- Order Items -->
                    <div class="space-y-4 mb-6">
                        <div class="flex">
                            <div class="h-16 w-16 flex-shrink-0 overflow-hidden rounded-md">
                                <img 
                                    src="https://images.unsplash.com/photo-1576566588028-4147f3842f27?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1064&q=80" 
                                    alt="Cashmere Sweater" 
                                    class="h-full w-full object-cover"
                                >
                            </div>
                            <div class="ml-4 flex-1">
                                <div class="flex justify-between">
                                    <h3 class="text-sm">Cashmere Sweater</h3>
                                    <p class="text-sm font-medium">$220.00</p>
                                </div>
                                <p class="mt-1 text-xs text-stone-500">Stone / M</p>
                                <p class="mt-1 text-xs text-stone-500">Qty: 1</p>
                            </div>
                        </div>
                        
                        <div class="flex">
                            <div class="h-16 w-16 flex-shrink-0 overflow-hidden rounded-md">
                                <img 
                                    src="https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=987&q=80" 
                                    alt="Leather Bag" 
                                    class="h-full w-full object-cover"
                                >
                            </div>
                            <div class="ml-4 flex-1">
                                <div class="flex justify-between">
                                    <h3 class="text-sm">Leather Bag</h3>
                                    <p class="text-sm font-medium">$195.00</p>
                                </div>
                                <p class="mt-1 text-xs text-stone-500">Black</p>
                                <p class="mt-1 text-xs text-stone-500">Qty: 1</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Order Totals -->
                    <div class="space-y-4 border-t border-stone-200 pt-4">
                        <div class="flex justify-between">
                            <p class="text-sm text-stone-600">Subtotal</p>
                            <p class="text-sm font-medium">$415.00</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="text-sm text-stone-600">Shipping</p>
                            <p class="text-sm font-medium">Free</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="text-sm text-stone-600">Tax</p>
                            <p class="text-sm font-medium">$33.20</p>
                        </div>
                        <div class="flex justify-between border-t border-stone-200 pt-4">
                            <p class="text-base font-medium">Total</p>
                            <p class="text-base font-medium">$448.20</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

