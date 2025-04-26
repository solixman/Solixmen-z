@extends('client.layout')

@section('title', 'My Orders | ELEGANCE')

@section('content')
<!-- Account Header -->
<div class="bg-stone-50 border-b border-stone-200">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-2xl md:text-3xl font-serif text-stone-800">My Orders</h1>
        <p class="text-stone-600 mt-1">View and manage your order history</p>
    </div>
</div>

<div class="bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="max-w-5xl mx-auto">
            <!-- Order Filters -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                <div class="flex items-center">
                    <span class="text-sm text-stone-600 mr-2">Filter by:</span>
                    <select class="border border-stone-300 rounded-md text-sm py-1.5 px-3 focus:outline-none focus:ring-0 focus:border-stone-500">
                        <option value="all">All Orders</option>
                        <option value="pending">Pending</option>
                        <option value="processing">Processing</option>
                        <option value="shipped">Shipped</option>
                        <option value="delivered">Delivered</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
                
                <div class="relative">
                    <input type="text" placeholder="Search orders..." class="border border-stone-300 rounded-md text-sm py-1.5 pl-9 pr-3 w-full md:w-auto focus:outline-none focus:ring-0 focus:border-stone-500">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-stone-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
            </div>
            
            <!-- Orders List -->
            @if(count($orders) > 0)
                <div class="bg-white border border-stone-200 rounded-lg overflow-hidden mb-8">
                    <!-- Desktop View -->
                    <div class="hidden md:block">
                        <table class="min-w-full divide-y divide-stone-200">
                            <thead class="bg-stone-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-stone-500 uppercase tracking-wider">Order</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-stone-500 uppercase tracking-wider">Date</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-stone-500 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-stone-500 uppercase tracking-wider">Total</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-stone-500 uppercase tracking-wider">Items</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-stone-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-stone-200">
                                @foreach($orders as $order)
                                <tr class="hover:bg-stone-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-stone-800">#ORD-{{ $order->id }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-stone-600">{{ $order->orderDate }}</div>
                                        <div class="text-xs text-stone-500">{{ $order->orderDate}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                            @if($order->status == 'pending') bg-yellow-100 text-yellow-800 
                                            @elseif($order->status == 'processing') bg-blue-100 text-blue-800 
                                            @elseif($order->status == 'shipped') bg-purple-100 text-purple-800 
                                            @elseif($order->status == 'delivered') bg-green-100 text-green-800 
                                            @elseif($order->status == 'cancelled') bg-red-100 text-red-800 
                                            @endif">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-stone-800">
                                            ${{ number_format($order->order_products->sum('subtotal'), 2) }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-stone-600">{{ $order->order_products->count() }} items</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="/order/details?id={{ $order->id }}" class="text-stone-600 hover:text-stone-900">View</a>
                                        @if($order->status == 'pending' || $order->status == 'processing')
                                        <span class="mx-2 text-stone-300">|</span>
                                        <a href="/order/cancel?id={{ $order->id }}" class="text-stone-600 hover:text-stone-900">Cancel</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Mobile View -->
                    <div class="md:hidden divide-y divide-stone-200">
                        @foreach($orders as $order)
                        <div class="p-4">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <div class="text-sm font-medium text-stone-800">Order #ORD-{{ $order->id }}</div>
                                    <div class="text-xs text-stone-500">{{ $order->orderDate }}</div>
                                </div>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                    @if($order->status == 'pending') bg-yellow-100 text-yellow-800 
                                    @elseif($order->status == 'processing') bg-blue-100 text-blue-800 
                                    @elseif($order->status == 'shipped') bg-purple-100 text-purple-800 
                                    @elseif($order->status == 'delivered') bg-green-100 text-green-800 
                                    @elseif($order->status == 'cancelled') bg-red-100 text-red-800 
                                    @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </div>
                            <div class="flex justify-between items-center mb-3">
                                <div class="text-sm text-stone-600">{{ $order->order_products->count() }} items</div>
                                <div class="text-sm font-medium text-stone-800">${{ number_format($order->order_products->sum('subtotal'), 2) }}</div>
                            </div>
                            <div class="flex justify-between items-center">
                                <a href="/account/orders/{{ $order->id }}" class="text-sm text-stone-600 hover:text-stone-900 flex items-center">
                                    <span>View Details</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                                @if($order->status == 'pending' || $order->status == 'processing')
                                <button class="text-sm text-stone-600 hover:text-stone-900">Cancel Order</button>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            @else
                <!-- No Orders -->
                <div class="bg-white border border-stone-200 rounded-lg p-8 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-stone-100 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-stone-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-stone-800 mb-2">No Orders Yet</h3>
                    <p class="text-stone-600 mb-6">You haven't placed any orders with us yet.</p>
                    <a href="/shop" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-sm font-medium rounded-md text-white bg-stone-800 hover:bg-stone-900">
                        Start Shopping
                    </a>
                </div>
            @endif
            
            <!-- Need Help -->
            <div class="bg-stone-50 rounded-lg p-6 mt-8">
                <div class="flex flex-col md:flex-row items-start md:items-center justify-between">
                    <div>
                        <h3 class="text-lg font-medium text-stone-800 mb-1">Need Help With Your Order?</h3>
                        <p class="text-stone-600">Our customer service team is here to assist you.</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <a href="/contact" class="inline-flex items-center px-4 py-2 border border-stone-300 rounded-md text-sm font-medium text-stone-700 bg-white hover:bg-stone-50">
                            Contact Support
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection