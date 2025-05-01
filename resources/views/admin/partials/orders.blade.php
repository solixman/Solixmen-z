@extends('admin.layout')

@section('admin-title', 'Orders')

@section('admin-content')
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div class="flex flex-wrap items-center gap-3">
            <div class="relative">
                <input type="text" placeholder="Search orders..."
                    class="pl-10 pr-4 py-2.5 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-lg w-full sm:w-72 shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-stone-400" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            <div class="relative">
                <select
                    class="pl-4 pr-10 py-2.5 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-lg appearance-none bg-white shadow-sm">
                    <option value="">All Statuses</option>
                    <option value="processing">Processing</option>
                    <option value="shipped">Shipped</option>
                    <option value="delivered">Delivered</option>
                    <option value="cancelled">Cancelled</option>
                </select>
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-stone-400" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            <div class="relative">
                <select
                    class="pl-4 pr-10 py-2.5 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-lg appearance-none bg-white shadow-sm">
                    <option value="">Date: All Time</option>
                    <option value="today">Today</option>
                    <option value="yesterday">Yesterday</option>
                    <option value="week">This Week</option>
                    <option value="month">This Month</option>
                    <option value="year">This Year</option>
                </select>
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-stone-400" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="flex gap-2">
            <button
                class="bg-stone-100 hover:bg-stone-200 text-stone-800 px-4 py-2.5 rounded-lg transition duration-150 ease-in-out inline-flex items-center shadow-sm border border-stone-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h9m5-4v12m0 0l-4-4m4 4l4-4" />
                </svg>
                Generate Report
            </button>
            <button
                class="bg-stone-100 hover:bg-stone-200 text-stone-800 px-4 py-2.5 rounded-lg transition duration-150 ease-in-out inline-flex items-center shadow-sm border border-stone-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
            </button>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-stone-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-stone-50 text-left">
                    <tr>
                        <th class="px-6 py-4 text-xs font-medium text-stone-500 uppercase tracking-wider">Order ID</th>
                        <th class="px-6 py-4 text-xs font-medium text-stone-500 uppercase tracking-wider">Customer</th>
                        <th class="px-6 py-4 text-xs font-medium text-stone-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-4 text-xs font-medium text-stone-500 uppercase tracking-wider">Items</th>
                        <th class="px-6 py-4 text-xs font-medium text-stone-500 uppercase tracking-wider">Total</th>
                        <th class="px-6 py-4 text-xs font-medium text-stone-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-xs font-medium text-stone-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @if(count($orders) > 0)
                        @foreach($orders as $order)
                            <tr class="hover:bg-stone-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-stone-700">#ORD-{{ $order->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-stone-600">
                                    @if ($order->user)
                                        {{ $order->user->firstName ?? '' }} {{ $order->user->lastName ?? '' }}
                                        @if (!$order->user->firstName && !$order->user->lastName)
                                            {{ $order->user->name ?? 'Guest Customer' }}
                                        @endif
                                    @else
                                        Guest Customer
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-stone-600">
                                    {{ $order->orderDate }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-stone-600">
                                    {{ $order->order_products->count() }}
                                    {{ $order->order_products->count() == 1 ? 'item' : 'items' }}
                                </td>
                                @php
                                    $total = 0;
                                    foreach ($order->order_products as $item) {
                                        $total += $item->subtotal;
                                    }
                                @endphp
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-stone-700">${{ number_format($total ?? 0, 2) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                @if ($order->status == 'delivered') bg-green-100 text-green-800 border border-green-200
                                @elseif($order->status == 'shipped') bg-blue-100 text-blue-800 border border-blue-200
                                @elseif($order->status == 'processing') bg-amber-100 text-amber-800 border border-amber-200
                                @elseif($order->status == 'cancelled') bg-red-100 text-red-800 border border-red-200
                                @elseif($order->status == 'pending') bg-purple-100 text-purple-800 border border-purple-200
                                @elseif($order->status == 'returned') bg-pink-100 text-pink-800 border border-pink-200
                                @elseif($order->status == 'refunded') bg-teal-100 text-teal-800 border border-teal-200
                                @elseif($order->status == 'on_hold') bg-indigo-100 text-indigo-800 border border-indigo-200
                                @else bg-stone-100 text-stone-800 border border-stone-200 @endif">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <div class="flex items-center space-x-3">
                                        <div class="relative group">
                                            <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="flex items-center space-x-2">
                                                @csrf
                                                @method('PATCH')
                                                <select name="status" class="text-xs border border-stone-300 rounded-md py-1 pl-2 pr-7 focus:outline-none focus:ring-1 focus:ring-stone-500 focus:border-stone-500 bg-white shadow-sm">
                                                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                                    <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                                    <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                                </select>
                                                <button type="submit" class="bg-stone-100 hover:bg-stone-200 text-stone-700 text-xs px-2 py-1 rounded shadow-sm border border-stone-200 transition-colors">
                                                    Update
                                                </button>
                                            </form>
                                        </div>
                                        <div class="flex space-x-2 ml-1">
                                            <a href="" class="text-stone-600 hover:text-stone-900 transition-colors" title="View Order">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                            <a href="" class="text-red-500 hover:text-red-700 transition-colors" title="Cancel Order">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center text-sm text-stone-500">
                                <div class="flex flex-col items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-stone-300 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                    </svg>
                                    <p>No orders found</p>
                                    <p class="text-stone-400 mt-1">Create a new order or adjust your filters</p>
                                </div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
            @if(count($orders) > 0)
                <div class="px-6 py-4 border-t border-stone-100">
                    {{ $orders->onEachSide(1)->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection