@extends('admin.layout')

@section('admin-title', 'Dashboard')

@section('admin-content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Sales Overview Card -->
    <div class="bg-white p-6 rounded-lg shadow-sm border border-stone-100">
        <div class="flex justify-between items-start mb-4">
            <div>
                <h3 class="text-lg font-medium text-stone-800">Total Sales</h3>
                <p class="text-stone-500 text-sm">All time</p>
            </div>
            <div class="p-2 bg-stone-100 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-stone-600" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
        <div class="flex items-baseline">
            <span class="text-2xl font-semibold">${{ number_format($totalSales, 2) }}</span>
        </div>
    </div>

    <!-- Orders Card -->
    <div class="bg-white p-6 rounded-lg shadow-sm border border-stone-100">
        <div class="flex justify-between items-start mb-4">
            <div>
                <h3 class="text-lg font-medium text-stone-800">Orders</h3>
                <p class="text-stone-500 text-sm">Completed orders</p>
            </div>
            <div class="p-2 bg-stone-100 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-stone-600" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z" />
                    <path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
        <div class="flex items-baseline">
            <span class="text-2xl font-semibold">{{ $orderCount }}</span>
        </div>
    </div>

    <!-- Customers Card -->
    <div class="bg-white p-6 rounded-lg shadow-sm border border-stone-100">
        <div class="flex justify-between items-start mb-4">
            <div>
                <h3 class="text-lg font-medium text-stone-800">Customers</h3>
                <p class="text-stone-500 text-sm">Total with purchases</p>
            </div>
            <div class="p-2 bg-stone-100 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-stone-600" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                </svg>
            </div>
        </div>
        <div class="flex items-baseline">
            <span class="text-2xl font-semibold">{{ $customers }}</span>
        </div>
    </div>

    <!-- Products Card -->
    <div class="bg-white p-6 rounded-lg shadow-sm border border-stone-100">
        <div class="flex justify-between items-start mb-4">
            <div>
                <h3 class="text-lg font-medium text-stone-800">Products</h3>
                <p class="text-stone-500 text-sm">Active inventory</p>
            </div>
            <div class="p-2 bg-stone-100 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-stone-600" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
        <div class="flex items-baseline">
            <span class="text-2xl font-semibold">{{ $productsCount }}</span>
        </div>
    </div>
</div>

<!-- Recent Orders -->
<div class="bg-white rounded-lg shadow-sm border border-stone-100 mb-8">
    <div class="p-6 border-b border-stone-100">
        <div class="flex justify-between items-center">
            <h3 class="text-lg font-medium text-stone-800">Recent Orders</h3>
            <a href="/admin/orders" class="text-stone-600 hover:text-stone-900 text-sm font-medium">View All</a>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-stone-50 text-left">
                <tr>
                    <th class="px-6 py-3 text-xs font-medium text-stone-500 uppercase tracking-wider">Order ID</th>
                    <th class="px-6 py-3 text-xs font-medium text-stone-500 uppercase tracking-wider">Customer</th>
                    <th class="px-6 py-3 text-xs font-medium text-stone-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-xs font-medium text-stone-500 uppercase tracking-wider">Amount</th>
                    <th class="px-6 py-3 text-xs font-medium text-stone-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-xs font-medium text-stone-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-100">
                @forelse($orders as $order)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">#ORD-{{ $order->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $order->user->firstName .' '. $order->user->lastName ?? 'Guest' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $order->created_at->format('M d, Y') }}</td>

                    @php
                    $total =0;
                    foreach ($order->order_products as $OP) {
                        $total += $OP->subtotal;
                    }
                    @endphp
                    <td class="px-6 py-4 whitespace-nowrap text-sm">${{ number_format($total, 2) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @php
                            $statusClass = [
                                'pending' => 'bg-yellow-100 text-yellow-800',
                                'processing' => 'bg-blue-100 text-blue-800',
                                'shipped' => 'bg-blue-100 text-blue-800',
                                'delivered' => 'bg-green-100 text-green-800',
                                'cancelled' => 'bg-red-100 text-red-800',
                                'paid' => 'bg-green-100 text-green-800',
                            ][$order->status] ?? 'bg-stone-100 text-stone-800';
                        @endphp
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClass }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-stone-600">
                        <a href="/order/details?id={{$order->id}}" class="hover:text-stone-900">View</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-sm text-stone-500">No orders found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Analytics Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Top Products -->
    <div class="bg-white rounded-lg shadow-sm border border-stone-100">
        <div class="p-6 border-b border-stone-100">
            <h3 class="text-lg font-medium text-stone-800">Top Selling Products</h3>
        </div>
        <div class="p-6">
            <ul class="divide-y divide-stone-100">
                @forelse($products as $product)
                <li class="py-3 flex items-center">
                    <div class="h-10 w-10 rounded bg-stone-100 mr-4">
                        @if($product->image)
                        <img src="{{$product->image}}" alt="{{ $product->name }}" class="h-10 w-10 object-cover rounded">
                        @endif
                    </div>
                    <div class="flex-1">
                        <h4 class="text-sm font-medium">{{ $product->name }}</h4>
                        <p class="text-xs text-stone-500">{{ $product->order_products_count }} sold</p>
                    </div>
                    <div class="text-sm font-medium">${{ number_format($product->price, 2) }}</div>
                </li>
                @empty
                <li class="py-3 text-center text-sm text-stone-500">No products found</li>
                @endforelse
            </ul>
        </div>
    </div>

    <!-- Sales Chart -->
    <div class="bg-white rounded-lg shadow-sm border border-stone-100">
        <div class="p-6 border-b border-stone-100">
            <h3 class="text-lg font-medium text-stone-800">Sales Analytics</h3>
        </div>
        <div class="p-6">
            <div class="h-64 flex items-center justify-center text-stone-400">
                <p>

                    COMING SOON...
                </p>
            </div>
        </div>
    </div>
</div>
@endsection