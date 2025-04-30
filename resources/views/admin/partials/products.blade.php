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
    <a href="/product/create" class="bg-stone-800 hover:bg-stone-900 text-white px-4 py-2 rounded-md transition duration-150 ease-in-out inline-flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
        </svg>
        Add New Product
    </a>
</div>

<!-- Products Table -->
<div class="bg-white rounded-lg shadow-sm border border-stone-100 overflow-hidden mb-8">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-stone-50 text-left">
                <tr>
                    <th class="px-6 py-3 text-xs font-medium text-stone-500 uppercase tracking-wider">Product</th>
                    <th class="px-6 py-3 text-xs font-medium text-stone-500 uppercase tracking-wider">SKU</th>
                    <th class="px-6 py-3 text-xs font-medium text-stone-500 uppercase tracking-wider">Category</th>
                    <th class="px-6 py-3 text-xs font-medium text-stone-500 uppercase tracking-wider">Price</th>
                    <th class="px-6 py-3 text-xs font-medium text-stone-500 uppercase tracking-wider">Stock</th>
                    {{-- <th class="px-6 py-3 text-xs font-medium text-stone-500 uppercase tracking-wider">Status</th> --}}
                    <th class="px-6 py-3 text-xs font-medium text-stone-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-100">
                @forEach($products as $product)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="h-10 w-10 rounded bg-stone-100 mr-3"></div>
                            <div>
                                <div class="text-sm font-medium">{{$product->name}}</div>
                                <div class="text-xs text-stone-500">{{$product->type}}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">BLZ-001</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{$product->categorie->name}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">${{$product->price}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{$product->quantity}}</td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        <form action="/product/update" method="get" class="inline">
                            @csrf
                            <input type="hidden" for="id" name="id" value={{$product->id}} />
                            <button type="submit" class="text-stone-600 hover:text-stone-900 transition-colors bg-transparent border-0 p-0 m-0 cursor-pointer font-sans text-sm font-normal appearance-none focus:outline-none">
                              View/Edit
                            </button>
                        </form>
                        <form action="/product/delete" method="post" class="inline">
                            @csrf
                            @method('delete')
                            <input type="hidden" for="id" name="id" value="{{$product->id}}" />
                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
               
            </tbody>
        </table>
        {{$products->links()}}
    </div>
</div>

<!-- Categories Toggle Button -->
<div class="flex justify-center mb-6">
    <button id="toggleCategoriesBtn" class="group relative inline-flex items-center justify-center px-6 py-3 overflow-hidden font-medium transition duration-300 ease-out border-2 border-stone-500 rounded-md shadow-md">
        <span class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-x-full bg-stone-800 group-hover:translate-x-0 ease">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
            </svg>
        </span>
        <span class="absolute flex items-center justify-center w-full h-full text-stone-700 transition-all duration-300 transform group-hover:translate-x-full ease">
            <span id="toggleButtonText">Manage Categories</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transition-transform duration-300" id="toggleButtonIcon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </span>
        <span class="relative invisible">Manage Categories</span>
    </button>
</div>

<!-- Categories Management Section (Hidden by default) -->
<div id="categoriesSection" class="mb-6 hidden">
    <div class="bg-white rounded-lg shadow-sm border border-stone-100 overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 border-b border-stone-100">
            <h3 class="text-lg font-medium text-stone-800">Categories Management</h3>
            <button id="addCategoryBtn" class="bg-stone-800 hover:bg-stone-900 text-white px-3 py-1.5 rounded-md text-sm transition duration-150 ease-in-out inline-flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Add Category
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-stone-50 text-left">
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium text-stone-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-xs font-medium text-stone-500 uppercase tracking-wider">Description</th>
                        <th class="px-6 py-3 text-xs font-medium text-stone-500 uppercase tracking-wider">Products Count</th>
                        <th class="px-6 py-3 text-xs font-medium text-stone-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @foreach($categories as $category)
                    <tr>
                        <td class="px-6 py-3 whitespace-nowrap text-sm">{{ $category->name }}</td>
                        <td class="px-6 py-3 text-sm max-w-xs truncate">{{ $category->description }}</td>
                        <td class="px-6 py-3 whitespace-nowrap text-sm">{{ $category->products_count ?? 0 }}</td>
                        <td class="px-6 py-3 whitespace-nowrap text-sm">
                            <button 
                                class="text-stone-600 hover:text-stone-900 transition-colors mr-3 edit-category-btn" 
                                data-id="{{ $category->id }}" 
                                data-name="{{ $category->name }}"
                                data-description="{{ $category->description }}"
                            >
                                View/Edit
                            </button>
                            <form action="/category/delete" class="inline" method="POST">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id" value="{{ $category->id }}" />
                                <button type="submit" class="text-red-600 hover:text-red-900 transition-colors">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Category Modal -->
<div id="categoryModal" class="fixed inset-0 bg-stone-900 bg-opacity-50 z-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md mx-4">
        <div class="px-6 py-4 border-b border-stone-200 flex items-center justify-between">
            <h3 id="modalTitle" class="text-lg font-medium text-stone-800">Add Category</h3>
            <button id="closeModal" class="text-stone-400 hover:text-stone-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <form id="categoryForm" action="/category/store" method="post">
            @csrf
            <input type="hidden" id="categoryId" name="id">
            <div class="px-6 py-4">
                <div class="mb-4">
                    <label for="categoryName" class="block text-sm font-medium text-stone-700 mb-1">Category Name</label>
                    <input type="text" id="categoryName" name="name" class="w-full border border-stone-300 rounded-md px-3 py-2 focus:outline-none focus:ring-0 focus:border-stone-500" required>
                </div>
                <div class="mb-4">
                    <label for="categoryDescription" class="block text-sm font-medium text-stone-700 mb-1">Description</label>
                    <textarea id="categoryDescription" name="description" rows="3" class="w-full border border-stone-300 rounded-md px-3 py-2 focus:outline-none focus:ring-0 focus:border-stone-500"></textarea>
                </div>
            </div>
            <div class="px-6 py-3 bg-stone-50 border-t border-stone-200 flex justify-end">
                <button type="button" id="cancelBtn" class="px-4 py-2 border border-stone-300 rounded-md text-stone-700 bg-white hover:bg-stone-50 mr-2">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2 bg-stone-800 text-white rounded-md hover:bg-stone-900">
                    Save Category
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle Categories Section
        const toggleCategoriesBtn = document.getElementById('toggleCategoriesBtn');
        const categoriesSection = document.getElementById('categoriesSection');
        const toggleButtonIcon = document.getElementById('toggleButtonIcon');
        const toggleButtonText = document.getElementById('toggleButtonText');
        
        toggleCategoriesBtn.addEventListener('click', function() {
            categoriesSection.classList.toggle('hidden');
            
            // Rotate icon and change text when toggled
            if (categoriesSection.classList.contains('hidden')) {
                toggleButtonIcon.style.transform = 'rotate(0deg)';
                toggleButtonText.textContent = 'Manage Categories';
            } else {
                toggleButtonIcon.style.transform = 'rotate(180deg)';
                toggleButtonText.textContent = 'Hide Categories';
            }
        });
        
        // Modal Functionality
        const categoryModal = document.getElementById('categoryModal');
        const modalTitle = document.getElementById('modalTitle');
        const categoryForm = document.getElementById('categoryForm');
        const categoryId = document.getElementById('categoryId');
        const categoryName = document.getElementById('categoryName');
        const categoryDescription = document.getElementById('categoryDescription');
        const addCategoryBtn = document.getElementById('addCategoryBtn');
        const closeModal = document.getElementById('closeModal');
        const cancelBtn = document.getElementById('cancelBtn');
        const editCategoryBtns = document.querySelectorAll('.edit-category-btn');
        
        function openModal() {
            categoryModal.classList.remove('hidden');
        }
        
        function closeModalFunc() {
            categoryModal.classList.add('hidden');
            categoryForm.reset();
        }
        
        addCategoryBtn.addEventListener('click', function() {
            modalTitle.textContent = 'Add Category';
            categoryId.value = '';
            categoryName.value = '';
            categoryDescription.value = '';
            categoryForm.action = '/category/store';
            openModal();
        });
        
        editCategoryBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');
                const description = this.getAttribute('data-description');
                
                modalTitle.textContent = 'Edit Category';
                categoryId.value = id;
                categoryName.value = name;
                categoryDescription.value = description || '';
                categoryForm.action = '/category/update';
                openModal();
            });
        });
        
        closeModal.addEventListener('click', closeModalFunc);
        cancelBtn.addEventListener('click', closeModalFunc);
        
        // Close modal when clicking outside
        categoryModal.addEventListener('click', function(e) {
            if (e.target === categoryModal) {
                closeModalFunc();
            }
        });
    });
</script>
@endsection 