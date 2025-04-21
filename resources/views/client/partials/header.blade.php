<header class="bg-stone-50 border-b border-stone-200">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="/" class="text-stone-800 font-serif text-xl font-medium">SOLIXMEN'z</a>
            </div>
            
            <!-- Desktop Navigation -->
            <nav class="hidden md:flex space-x-8">
                <a href="/" class="text-stone-600 hover:text-stone-900 px-3 py-2 text-sm font-medium">Home</a>
                <a href="/listing" class="text-stone-600 hover:text-stone-900 px-3 py-2 text-sm font-medium">Women</a>
                <a href="/listing" class="text-stone-600 hover:text-stone-900 px-3 py-2 text-sm font-medium">Men</a>
                <a href="/listing" class="text-stone-600 hover:text-stone-900 px-3 py-2 text-sm font-medium">Accessories</a>
            </nav>
            
            <!-- Right side icons -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="/search" class="text-stone-600 hover:text-stone-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </a>
                <a href="/profile" class="text-stone-600 hover:text-stone-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </a>
                <a href="/cart" class="text-stone-600 hover:text-stone-900 relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span class="absolute -top-1 -right-1 bg-stone-800 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">
                        {{ $cartCount ?? 0 }}
                    </span>
                </a>
                @if(Auth::user() !== null)
                @if(Auth::user()->role->name=='Admin')
             
                <a href="/admin" class="text-stone-600 hover:text-stone-900 relative">
                    <img src="https://imgs.search.brave.com/4TYTWCI1WyH_b-MDbqndlsy2u2vewEQDX84XB4A4S4M/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly90My5m/dGNkbi5uZXQvanBn/LzEwLzQxLzIzLzM0/LzM2MF9GXzEwNDEy/MzM0NDJfT1BuVnZS/YkszVENIaXNjblJV/SVdGV1dReUdtbkJz/WEwuanBn" 
                    class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" alt="partie admin">
                </a>
                
                @endif
                @endif
            </div>

           
            
            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button type="button" class="mobile-menu-button text-stone-600 hover:text-stone-900 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
        
        <!-- Mobile menu, show/hide based on menu state -->
        <div class="mobile-menu hidden md:hidden pb-4">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="/" class="block px-3 py-2 text-stone-600 hover:text-stone-900 hover:bg-stone-100 rounded-md text-base font-medium">Home</a>
                <a href="/collections" class="block px-3 py-2 text-stone-600 hover:text-stone-900 hover:bg-stone-100 rounded-md text-base font-medium">Collections</a>
                <a href="/women" class="block px-3 py-2 text-stone-600 hover:text-stone-900 hover:bg-stone-100 rounded-md text-base font-medium">Women</a>
                <a href="/men" class="block px-3 py-2 text-stone-600 hover:text-stone-900 hover:bg-stone-100 rounded-md text-base font-medium">Men</a>
                <a href="/accessories" class="block px-3 py-2 text-stone-600 hover:text-stone-900 hover:bg-stone-100 rounded-md text-base font-medium">Accessories</a>
                <a href="/about" class="block px-3 py-2 text-stone-600 hover:text-stone-900 hover:bg-stone-100 rounded-md text-base font-medium">About</a>
            </div>
            <div class="pt-4 pb-3 border-t border-stone-200">
                <div class="flex items-center px-5">
                    <div class="flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-stone-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium text-stone-800">{{ $userName ?? 'Guest' }}</div>
                        <div class="text-sm font-medium text-stone-500">{{ $userEmail ?? '' }}</div>
                    </div>
                </div>
                <div class="mt-3 px-2 space-y-1">
                    <a href="/profile" class="block px-3 py-2 text-stone-600 hover:text-stone-900 hover:bg-stone-100 rounded-md text-base font-medium">Your Account</a>
                    <a href="/orders" class="block px-3 py-2 text-stone-600 hover:text-stone-900 hover:bg-stone-100 rounded-md text-base font-medium">Orders</a>
                    <a href="/wishlist" class="block px-3 py-2 text-stone-600 hover:text-stone-900 hover:bg-stone-100 rounded-md text-base font-medium">Wishlist</a>
                    <a href="/logout" class="block px-3 py-2 text-stone-600 hover:text-stone-900 hover:bg-stone-100 rounded-md text-base font-medium">Sign out</a>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    // Toggle mobile menu
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.querySelector('.mobile-menu-button');
        const mobileMenu = document.querySelector('.mobile-menu');
        
        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        }
    });
</script>

