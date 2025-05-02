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
                                        {{ $order->user->firstName ?? '' }} {{ $order->user->lastName ?? ''  }}
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
                                    @php
                                        $statusOptions = [
                                            'processing' => ['label' => 'Processing', 'class' => 'bg-amber-100 text-amber-800 border border-amber-200'],
                                            'shipped' => ['label' => 'Shipped', 'class' => 'bg-blue-100 text-blue-800 border border-blue-200'],
                                            'delivered' => ['label' => 'Delivered', 'class' => 'bg-green-100 text-green-800 border border-green-200'],
                                            'cancelled' => ['label' => 'Cancelled', 'class' => 'bg-red-100 text-red-800 border border-red-200'],
                                            'pending' => ['label' => 'Pending', 'class' => 'bg-purple-100 text-purple-800 border border-purple-200'],
                                            'returned' => ['label' => 'Returned', 'class' => 'bg-pink-100 text-pink-800 border border-pink-200'],
                                            'refunded' => ['label' => 'Refunded', 'class' => 'bg-teal-100 text-teal-800 border border-teal-200'],
                                            'on_hold' => ['label' => 'On Hold', 'class' => 'bg-indigo-100 text-indigo-800 border border-indigo-200']
                                        ];
                                        $currentStatusClass = $statusOptions[$order->status]['class'] ?? 'bg-stone-100 text-stone-800 border border-stone-200';
                                    @endphp
                                    <div class="relative">
                                        <form action="/order/update/status" method="POST" class="status-update-form">
                                            @csrf
                                            <select name="status" onchange="this.form.submit()" 
                                                class="appearance-none w-full px-3 py-1 text-xs leading-5 font-semibold rounded-full pr-8 {{ $currentStatusClass }}">
                                                @foreach($statusOptions as $value => $option)
                                                    <option value="{{ $value }}" {{ $order->status == $value ? 'selected' : '' }}
                                                        data-class="{{ $option['class'] }}">
                                                        {{ $option['label'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="id" value="{{$order->id}}">
                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                                </svg>
                                            </div>
                                        </form>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <div class="flex space-x-2">
                                        <a href="/order/details?id={{ $order->id }}" class="text-stone-600 hover:text-stone-900 transition-colors" title="View Order">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                        <a href="/order/cancel?id={{$order->id}}" class="text-red-500 hover:text-red-700 transition-colors" title="Cancel Order">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </a>
                                        
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

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Update dropdown styling when selection changes
        const statusDropdowns = document.querySelectorAll('.status-update-form select');
        statusDropdowns.forEach(dropdown => {
            dropdown.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const newClass = selectedOption.getAttribute('data-class');
                
                // Remove all existing status classes
                const classesToRemove = [
                    'bg-amber-100', 'text-amber-800', 'border-amber-200',
                    'bg-blue-100', 'text-blue-800', 'border-blue-200', 
                    'bg-green-100', 'text-green-800', 'border-green-200',
                    'bg-red-100', 'text-red-800', 'border-red-200',
                    'bg-purple-100', 'text-purple-800', 'border-purple-200',
                    'bg-pink-100', 'text-pink-800', 'border-pink-200',
                    'bg-teal-100', 'text-teal-800', 'border-teal-200',
                    'bg-indigo-100', 'text-indigo-800', 'border-indigo-200',
                    'bg-stone-100', 'text-stone-800', 'border-stone-200'
                ];
                
                classesToRemove.forEach(cls => {
                    this.classList.remove(cls);
                });
                
                // Add new classes
                if (newClass) {
                    newClass.split(' ').forEach(cls => {
                        this.classList.add(cls);
                    });
                }
            });
        });
    });
    </script>
@endsection