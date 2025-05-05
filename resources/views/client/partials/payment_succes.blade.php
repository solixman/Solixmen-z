<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', "Payment Successful - SOLIXMEN'z")</title>
    <meta name="description" content="@yield('description', 'Your payment has been successfully processed. Thank you for shopping with SOLIXMEN\'z.')">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        stone: {
                            50: '#fafaf9',
                            100: '#f5f5f4',
                            200: '#e7e5e4',
                            300: '#d6d3d1',
                            400: '#a8a29e',
                            500: '#78716c',
                            600: '#57534e',
                            700: '#44403c',
                            800: '#292524',
                            900: '#1c1917',
                        },
                    },
                    fontFamily: {
                        serif: ['Playfair Display', 'serif'],
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        .transition {
            transition: all 0.2s ease-in-out;
        }
        
        .btn-primary {
            @apply bg-stone-800 text-white py-3 px-6 rounded-md hover:bg-stone-900 transition;
        }
        
        .alert-success {
            @apply bg-green-50 text-green-800 border border-green-200 p-4 rounded-md mb-6;
        }
    </style>
</head>

<body class="bg-stone-50 text-stone-800 min-h-screen flex flex-col">
    <!-- Breadcrumb Navigation -->
    <div class="container mx-auto px-4 py-4">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/" class="inline-flex items-center text-sm font-medium text-stone-600 hover:text-stone-900">
                        <svg class="w-3 h-3 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-stone-400 mx-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <a href="/checkout" class="text-sm font-medium text-stone-600 hover:text-stone-900 ml-1 md:ml-2">Checkout</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-stone-400 mx-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-sm font-medium text-stone-500 ml-1 md:ml-2">Order Confirmation</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center py-8 px-4">
        <div class="w-full max-w-2xl">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-8">
                    <!-- Success Header -->
                    <div class="text-center mb-8">
                        <!-- Success Icon -->
                        <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-green-100 mb-4">
                            <svg class="h-10 w-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h1 class="text-3xl font-serif font-medium text-stone-800">Payment Successful!</h1>
                        <p class="text-stone-500 mt-2">Thank you for your purchase. Your order has been confirmed.</p>
                    </div>

                    <!-- Order Details -->
                    <div class="border border-stone-200 rounded-md p-6 mb-8">
                        <h2 class="text-lg font-medium text-stone-800 mb-4">Order Summary</h2>
                        
                        <div class="space-y-3">
                            <div class="flex justify-between text-sm">
                                <span class="text-stone-600">Order Number:</span>
                                <span class="font-medium">ORD-{{ $order->id ??  rand(10000, 99999) }}</span>
                            </div>
                            
                            <div class="flex justify-between text-sm">
                                <span class="text-stone-600">Date:</span>
                                <span>{{$order->orderDate}}</span>
                            </div>
                            
                            <div class="flex justify-between text-sm">
                                <span class="text-stone-600">Payment Method:</span>
                                <span>{{ $order->payment_method ?? 'Credit Card' }}</span>
                            </div>
                            
                            <div class="flex justify-between text-sm">
                                <span class="text-stone-600">Shipping Method:</span>
                                <span>{{ $order->shipping_method ?? 'Standard Shipping' }}</span>
                            </div>
                            
                            <div class="border-t border-stone-200 my-4"></div>
                            
                            <div class="flex justify-between">
                                <span class="font-medium">Total Paid:</span>
                                @php
                                    
                                @endphp
                                <span class="font-bold text-lg"> ${{ number_format($order->order_products->sum('subtotal'), 2) }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Next Steps -->
                    <div class="space-y-4 text-center">
                        <p class="text-stone-600">
                            We've sent a confirmation email to <span class="font-medium">{{ Auth::user()->email ?? 'your email address' }}</span> with all the details of your order.
                        </p>
                        
                        <p class="text-stone-600">
                            Your order will be shipped within 1-2 business days.
                        </p>
                        
                        <div class="pt-4">
                            <a href="/listing" class="inline-block btn-primary text-center font-medium">
                                Continue Shopping
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Additional Information -->
            <div class="mt-8 text-center text-sm text-stone-500">
                <p>Have questions about your order? <a href="/contact" class="text-stone-700 hover:underline">Contact our support team</a>.</p>
            </div>
        </div>
    </main>

    <!-- Footer -->
    @include('client.partials.footer')
</body>
</html>