
@if(Auth::user()->role->name==="Admin")
@extends('admin.layout')
@endif

{{-- @php
ini_set('memory_limit', '-1');

@endphp --}}

@section('admin-title', 'Order Details')

@section('admin-content')

    <div class="mb-6">
        <a href="{{ route('admin.orders') }}" class="text-stone-600 hover:text-stone-900 inline-flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                    clip-rule="evenodd" />
            </svg>
            Back to Orders
        </a>
    </div>

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-serif">Order #{{ $order->id }}</h2>
        <div class="flex space-x-3">
            <a href=""
                class="px-4 py-2 border border-stone-300 rounded-md text-stone-700 bg-white hover:bg-stone-50 inline-flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0v3H7V4h6zm-5 7a1 1 0 100-2 1 1 0 000 2zm0 2a1 1 0 100 2 1 1 0 000-2zm6-2a1 1 0 100-2 1 1 0 000 2zm0 2a1 1 0 100 2 1 1 0 000-2z"
                        clip-rule="evenodd" />
                </svg>
                Print Invoice
            </a>
            @if ($order->user && $order->user->email)
                <a href=""
                    class="px-4 py-2 border border-stone-300 rounded-md text-stone-700 bg-white hover:bg-stone-50 inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                    </svg>
                    Email Customer
                </a>
            @endif
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Order Details -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-lg shadow-sm border border-stone-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-stone-100 bg-stone-50">
                    <h3 class="font-medium">Order Items</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="text-left">
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium text-stone-500 uppercase tracking-wider">Products
                                </th>
                                <th class="px-6 py-3 text-xs font-medium text-stone-500 uppercase tracking-wider">Price</th>
                                <th class="px-6 py-3 text-xs font-medium text-stone-500 uppercase tracking-wider">Quantity
                                </th>
                                <th class="px-6 py-3 text-xs font-medium text-stone-500 uppercase tracking-wider">Total</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-stone-100">
                            @php $subtotal = 0; @endphp
                            @foreach ($order->order_products as $item)
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            @if ($item->product && $item->product->image)
                                                <img src="{{ asset('storage/' . $item->product->image) }}"
                                                    alt="{{ $item->product->name }}"
                                                    class="h-10 w-10 rounded object-cover mr-3">
                                            @else
                                                <div class="h-10 w-10 rounded bg-stone-100 mr-3"></div>
                                            @endif
                                            <div>
                                                <div class="text-sm font-medium">
                                                    {{ $item->product->name ?? 'Product Unavailable' }}</div>
                                                @if ($item->product && ($item->product->size || $item->product->color))
                                                    <div class="text-xs text-stone-500">
                                                        @if ($item->product->size)
                                                            Size: {{ $item->product->size }},
                                                        @endif
                                                        @if ($item->product->color)
                                                            Color: {{ $item->product->color }}
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm">${{ number_format($item->priceAtMoment, 2) }}</td>
                                    <td class="px-6 py-4 text-sm">{{ $item->quantity }}</td>
                                    <td class="px-6 py-4 text-sm font-medium">${{ number_format($item->subtotal, 2) }}</td>
                                </tr>
                                @php $subtotal += $item->subtotal; @endphp
                            @endforeach
                        </tbody>
                        <tfoot class="bg-stone-50">
                            <tr>
                                <td colspan="3" class="px-6 py-3 text-sm text-right font-medium">Subtotal</td>
                                <td class="px-6 py-3 text-sm font-medium">${{ number_format($subtotal, 2) }}</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="px-6 py-3 text-sm text-right font-medium">Shipping</td>
                                <td class="px-6 py-3 text-sm font-medium">
                                    ${{ number_format($order->shipping_cost ?? 0, 2) }}</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="px-6 py-3 text-sm text-right font-medium">Tax</td>
                                <td class="px-6 py-3 text-sm font-medium">${{ number_format($order->tax ?? 0, 2) }}</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="px-6 py-3 text-sm text-right font-medium">Total</td>
                                <td class="px-6 py-3 text-sm font-medium">
                                    ${{ number_format($order->Total ?? $subtotal, 2) }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm border border-stone-100">
                <div class="px-6 py-4 border-b border-stone-100 bg-stone-50">
                    <h3 class="font-medium">Order Timeline</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-6">
                        @if ($order->status == 'delivered')
                            <div class="flex">
                                <div class="flex flex-col items-center mr-4">
                                    <div
                                        class="rounded-full h-8 w-8 flex items-center justify-center bg-green-100 text-green-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="h-full w-0.5 bg-stone-200"></div>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium">Order Delivered</h4>
                                    <p class="text-xs text-stone-500">
                                        {{-- {{ $order->deliveryDate ? $order->deliveryDate->format('M d, Y \a\t g:i A') : 'Date not available' }} --}}
                                        {{$order->deliveryDate}}     
                                    </p>
                                    <p class="text-sm mt-1">Package was delivered to the customer.</p>
                                </div>
                            </div>
                        @endif

                        @if ($order->status == 'delivered' || $order->status == 'shipped')
                            <div class="flex">
                                <div class="flex flex-col items-center mr-4">
                                    <div
                                        class="rounded-full h-8 w-8 flex items-center justify-center bg-blue-100 text-blue-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                                            <path
                                                d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1v-5h2a1 1 0 00.9-.5l1.08-1.5-3.7-3.7A1 1 0 0010.48 4H3z" />
                                        </svg>
                                    </div>
                                    <div class="h-full w-0.5 bg-stone-200"></div>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium">Order Shipped</h4>
                                    <p class="text-xs text-stone-500">
                                        {{ $order->shippingDate ? $order->shippingDate->format('M d, Y \a\t g:i A') : 'Date not available' }}
                                    </p>
                                    <p class="text-sm mt-1">Package was shipped via
                                        {{ $order->shipping_method ?? 'Standard Shipping' }}.</p>
                                    @if ($order->tracking_number)
                                        <p class="text-sm mt-1">Tracking Number: <span
                                                class="font-medium">{{ $order->tracking_number }}</span></p>
                                    @endif
                                </div>
                            </div>
                        @endif

                        @if ($order->status == 'delivered' || $order->status == 'shipped' || $order->status == 'processing')
                            <div class="flex">
                                <div class="flex flex-col items-center mr-4">
                                    <div
                                        class="rounded-full h-8 w-8 flex items-center justify-center bg-yellow-100 text-yellow-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="h-full w-0.5 bg-stone-200"></div>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium">Order Processing</h4>
                                    <p class="text-xs text-stone-500">
                                        {{ $order->processingDate ? $order->processingDate->format('M d, Y \a\t g:i A') : 'Date not available' }}
                                    </p>
                                    <p class="text-sm mt-1">Order has been processed and is being prepared for shipping.
                                    </p>
                                </div>
                            </div>
                        @endif

                        <div class="flex">
                            <div class="flex flex-col items-center mr-4">
                                <div
                                    class="rounded-full h-8 w-8 flex items-center justify-center bg-stone-100 text-stone-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-sm font-medium">Order Placed</h4>
                                <p class="text-xs text-stone-500">
                                    {{-- {{ $order->orderDate ? $order->orderDate->format('M d, Y \a\t g:i A') : 'Date not available' }} --}}
                                    {{ $order->orderDate}}
                                </p>
                                <p class="text-sm mt-1">Order was placed by the customer.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <div class="bg-white rounded-lg shadow-sm border border-stone-100">
                <div class="px-6 py-4 border-b border-stone-100 bg-stone-50">
                    <h3 class="font-medium">Order Summary</h3>
                </div>
                <div class="p-6 space-y-4">
                    <div>
                        <div class="text-sm text-stone-500">Order ID</div>
                        <div class="font-medium">#{{ $order->id }}</div>
                    </div>
                    <div>
                        <div class="text-sm text-stone-500">Date Placed</div>
                        <div>
                            {{-- {{ $order->orderDate ? $order->orderDate->format('M d, Y \a\t g:i A') : 'Date not available' }} --}}
                            {{ $order->orderDate}}
                        </div>
                    </div>
                    <div>
                        <div class="text-sm text-stone-500">Status</div>
                        <div class="inline-flex items-center">
                            <span
                                class="w-2 h-2 rounded-full 
                            @if ($order->status == 'delivered') bg-green-500 
                            @elseif($order->status == 'shipped') bg-blue-500 
                            @elseif($order->status == 'processing') bg-yellow-500 
                            @elseif($order->status == 'cancelled') bg-red-500 
                            @else bg-stone-500 @endif mr-2"></span>
                            <span class="capitalize">{{ $order->status }}</span>
                        </div>
                    </div>
                    <div>
                        <div class="text-sm text-stone-500">Payment Method</div>
                        <div>{{ $order->payment_method ?? 'Not specified' }}</div>
                    </div>
                    <div>
                        <div class="text-sm text-stone-500">Payment Status</div>
                        <div class="{{ $order->payment_status == 'paid' ? 'text-green-600' : 'text-yellow-600' }}">
                            {{ ucfirst($order->payment_status ?? 'Pending') }}
                        </div>
                    </div>
                </div>
            </div>

            @if (Auth::user()->role->name == 'Admin')
                <div class="bg-white rounded-lg shadow-sm border border-stone-100">
                    <div class="px-6 py-4 border-b border-stone-100 bg-stone-50">
                        <h3 class="font-medium">Customer Information</h3>
                    </div>
                    <div class="p-6 space-y-4">
                        <div>
                            <div class="text-sm text-stone-500">Customer</div>
                            <div class="font-medium">
                                {{ $order->user->firstName ?? '' }} {{ $order->user->lastName ?? '' }}
                                @if (!$order->user->firstName && !$order->user->lastName)
                                    {{ $order->user->name ?? 'Guest Customer' }}
                                @endif
                            </div>
                            <div class="text-sm">Email: {{ $order->user->email ?? 'No email provided' }}</div>
                            <div class="text-sm">Phone: {{ $order->user->phoneNumber ?? 'No phone provided' }}</div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <div class="text-sm text-stone-500">Shipping Address</div>
                                <div class="text-sm">
                                    {{ $order->shipping_address ?? 'No shipping address provided' }}
                                    @if ($order->shipping_city || $order->shipping_state || $order->shipping_zip)
                                        <br>
                                        {{ $order->shipping_city ?? '' }}{{ $order->shipping_city && $order->shipping_state ? ', ' : '' }}{{ $order->shipping_state ?? '' }}
                                        {{ $order->shipping_zip ?? '' }}
                                    @endif
                                    @if ($order->shipping_country)
                                        <br>{{ $order->shipping_country }}
                                    @endif
                                </div>
                            </div>
                            <div>
                                <div class="text-sm text-stone-500">Billing Address</div>
                                <div class="text-sm">
                                    {{ $order->billing_address ?? 'Same as shipping address' }}
                                    @if ($order->billing_address && ($order->billing_city || $order->billing_state || $order->billing_zip))
                                        <br>
                                        {{ $order->billing_city ?? '' }}{{ $order->billing_city && $order->billing_state ? ', ' : '' }}{{ $order->billing_state ?? '' }}
                                        {{ $order->billing_zip ?? '' }}
                                    @endif
                                    @if ($order->billing_address && $order->billing_country)
                                        <br>{{ $order->billing_country }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="bg-white rounded-lg shadow-sm border border-stone-100">
                    <div class="px-6 py-4 border-b border-stone-100 bg-stone-50">
                        <h3 class="font-medium">Actions</h3>
                    </div>
                    <div class="p-6">
                        <div class="flex flex-col sm:flex-row gap-4">
                            <form action="/checkout" class="flex-1" method="get">
                                @csrf
                                <input type="hidden" name="id" value="{{$order->id}}">
                                <button type="submit"
                                    class="w-full px-4 py-3 bg-green-600 hover:bg-green-700 text-white rounded-md font-medium">
                                    Checkout
                                </button>
                            </form>
                
                            <form action="/order/cancel" method="get" class="flex-1">
                                @csrf
                                <input type="hidden" name="id" value="{{$order->id}}">
                                <button type="submit"
                                    class="w-full px-4 py-3 bg-red-600 hover:bg-red-700 text-white rounded-md font-medium">
                                    cancel
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                
                @if(Auth::user()->role->name == 'Admin')

                <div class="bg-white rounded-lg shadow-sm border border-stone-100">
                    <div class="px-6 py-4 border-b border-stone-100 bg-stone-50">
                        <h3 class="font-medium">Update Order Status</h3>
                    </div>
                    <div class="p-6">
                        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="status" class="block text-sm font-medium text-stone-700 mb-1">Status</label>
                                <select id="status" name="status"
                                    class="w-full px-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>
                                        Processing</option>
                                    <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped
                                    </option>
                                    <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>
                                        Delivered</option>
                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>
                                        Cancelled</option>
                                    <option value="refunded" {{ $order->status == 'refunded' ? 'selected' : '' }}>Refunded
                                    </option>
                                </select>
                            </div>
                            <button type="submit"
                                class="w-full px-4 py-2 bg-stone-800 hover:bg-stone-900 text-white rounded-md">Update
                                Status</button>
                        </form>

                    </div>
                </div>
            @endif
        </div>
    </div>


@endsection
