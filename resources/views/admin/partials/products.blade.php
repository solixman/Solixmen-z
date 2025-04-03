@extends('admin.layout')

@section('admin-title', 'Products')

@section('admin-content')
<div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div class="flex items-center gap-2">
        <div class="relative">
            <input type="text" placeholder="Search products..." class="pl-10 pr-4 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md w-full sm:w-64">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-stone-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
        <div class="relative">
            <select class="pl-4 pr-10 py-2 border border-stone-300 focus:border-stone-500 focus:ring-0 rounded-md appearance-none bg-white">
                <option value="">All Categories</option>
                <option value="women">Women</option>
                <option value="men">Men</option>
                <option value="accessories">Accessories</option>
            </select>
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-stone-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
    </div>
    <a href="/admin/products/create" class="bg-stone-800 hover:bg-stone-900 text-white px-4 py-2 rounded-md transition duration-150 ease-in-out inline-flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
        </svg>
        Add New Product
    </a>
</div>

<div class="bg-white rounded-lg shadow-sm border border-stone-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-stone-50 text-left">
                <tr>
                    <th class="px-6 py-3 text-xs font-medium text-stone-500 uppercase tracking-wider">Product</th>
                    <th class="px-6 py-3 text-xs font-medium text-stone-500 uppercase tracking-wider">SKU</th>
                    <th class="px-6 py-3 text-xs font-medium text-stone-500 uppercase tracking-wider">Category</th>
                    <th class="px-6 py-3 text-xs font-medium text-stone-500 uppercase tracking-wider">Price</th>
                    <th class="px-6 py-3 text-xs font-medium text-stone-500 uppercase tracking-wider">Stock</th>
                    <th class="px-6 py-3 text-xs font-medium text-stone-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-xs font-medium text-stone-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-100">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="h-10 w-10 rounded bg-stone-100 mr-3"></div>
                            <div>
                                <div class="text-sm font-medium">Tailored Wool Blazer</div>
                                <div class="text-xs text-stone-500">Classic fit, premium fabric</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">BLZ-001</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">Women</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">$189.00</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">42</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        {{-- <div class="flex space-x-2">
                            <a href="{{ route('admin.products.edit', 1) }}" class="text-stone-600 hover:text-stone-900">Edit</a>
                            <button class="text-red-600 hover:text-red-900">Delete</button>
                        </div> --}}
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="h-10 w-10 rounded bg-stone-100 mr-3"></div>
                            <div>
                                <div class="text-sm font-medium">Silk Midi Dress</div>
                                <div class="text-xs text-stone-500">Elegant drape, natural fabric</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">DRS-002</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">Women</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">$165.00</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">28</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        {{-- <div class="flex space-x-2">
                            <a href="{{ route('admin.products.edit', 2) }}" class="text-stone-600 hover:text-stone-900">Edit</a>
                            <button class="text-red-600 hover:text-red-900">Delete</button>
                        </div> --}}
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="h-10 w-10 rounded bg-stone-100 mr-3"></div>
                            <div>
                                <div class="text-sm font-medium">Cashmere Sweater</div>
                                <div class="text-xs text-stone-500">Soft texture, timeless design</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">SWT-003</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">Men</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">$220.00</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">15</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Low Stock</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        {{-- <div class="flex space-x-2">
                            <a href="{{ route('admin.products.edit', 3) }}" class="text-stone-600 hover:text-stone-900">Edit</a>
                            <button class="text-red-600 hover:text-red-900">Delete</button>
                        </div> --}}
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="h-10 w-10 rounded bg-stone-100 mr-3"></div>
                            <div>
                                <div class="text-sm font-medium">Leather Tote Bag</div>
                                <div class="text-xs text-stone-500">Handcrafted, premium leather</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">BAG-004</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">Accessories</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">$175.00</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">32</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        {{-- <div class="flex space-x-2">
                            <a href="{{ route('admin.products.edit', 4) }}" class="text-stone-600 hover:text-stone-900">Edit</a>
                            <button class="text-red-600 hover:text-red-900">Delete</button>
                        </div> --}}
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="h-10 w-10 rounded bg-stone-100 mr-3"></div>
                            <div>
                                <div class="text-sm font-medium">Linen Shirt</div>
                                <div class="text-xs text-stone-500">Breathable fabric, relaxed fit</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">SHT-005</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">Men</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">$95.00</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">0</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Out of Stock</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        {{-- <div class="flex space-x-2">
                            <a href="{{ route('admin.products.edit', 5) }}" class="text-stone-600 hover:text-stone-900">Edit</a>
                            <button class="text-red-600 hover:text-red-900">Delete</button>
                        </div> --}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="px-6 py-4 border-t border-stone-100 bg-stone-50">
        <div class="flex items-center justify-between">
            <div class="text-sm text-stone-600">
                Showing <span class="font-medium">1</span> to <span class="font-medium">5</span> of <span class="font-medium">48</span> results
            </div>
            <div class="flex space-x-2">
                <button class="px-3 py-1 border border-stone-300 rounded-md text-sm bg-white text-stone-500 hover:bg-stone-50">Previous</button>
                <button class="px-3 py-1 border border-stone-300 rounded-md text-sm bg-stone-800 text-white">1</button>
                <button class="px-3 py-1 border border-stone-300 rounded-md text-sm bg-white text-stone-500 hover:bg-stone-50">2</button>
                <button class="px-3 py-1 border border-stone-300 rounded-md text-sm bg-white text-stone-500 hover:bg-stone-50">3</button>
                <button class="px-3 py-1 border border-stone-300 rounded-md text-sm bg-white text-stone-500 hover:bg-stone-50">Next</button>
            </div>
        </div>
    </div>
</div>
@endsection