<header class="bg-stone-900 text-white">
    <!-- Main Header -->
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
        <!-- Logo -->
        <a href="/" style="color: antiquewhite !important" class="font-serif text-2xl font-bold tracking-tight">SOLIXMEN'z</a>
        
        <!-- Main Navigation -->
        <div class="hidden md:flex space-x-8">
            <a href="listing?categorie=men" style="color: antiquewhite !important" class="font-medium hover:text-gray-300 transition">MEN</a>
            <a href="listing?categorie=Women" style="color: antiquewhite !important" class="font-medium hover:text-stone-300 transition">WOMEN</a>
        </div>
        
        <!-- Search Bar -->
        <div class="hidden md:block flex-1 max-w-xl mx-8">
            <form action="/listing" method="get" class="relative">
                <input 
                    type="text" 
                    name="searchign_word" 
                    placeholder="Search for items and brands" 
                    class="w-full py-2 px-4 pr-10 rounded-full bg-white text-stone-800 focus:outline-none"
                >
                <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-stone-500">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </svg>
                </button>
            </form>
        </div>
        
        <!-- User Actions -->
        <div class="flex items-center space-x-6">
            <!-- Mobile Search Toggle -->
            <button class="md:hidden text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.3-4.3"></path>
                </svg>
            </button>
            
            <!-- Profile - With Dropdown -->
            <div class="relative" id="profile-dropdown">
                <button class="flex items-center focus:outline-none" id="profile-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </button>
                
                <!-- Dropdown Menu - Not Logged In (Guest) -->
                @if(!Auth::check())
                <div id="guest-dropdown" class="absolute right-0 top-full mt-1 w-64 bg-white text-stone-800 rounded-md shadow-lg z-50 hidden">
                    <!-- Sign In / Join Section -->
                    <div class="p-4 border-b border-stone-200 flex justify-between items-center">
                        <div>
                            <a href="/login" class="font-medium text-stone-800 hover:underline">Sign In</a>
                            <span class="mx-2">|</span>
                            <a href="/register" class="font-medium text-stone-800 hover:underline">Join</a>
                        </div>
                        <button class="text-stone-500 hover:text-stone-700" id="close-guest-dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg>
                        </button>
                    </div>
                    
                    <!-- Options for Guests -->
                    <div class="py-2">
                       
                        
                        <a href="/listing" class="flex items-center px-4 py-3 hover:bg-stone-100">
                            <img src="https://cdn-icons-png.flaticon.com/128/2789/2789609.png" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-3 text-stone-600" alt="our products">
                            <span>Our products</span>
                        </a>
                        
                    </div>
                </div>
                @else
                <!-- Dropdown Menu - Logged In User -->
                <div id="user-dropdown" class="absolute right-0 top-full mt-1 w-64 bg-white text-stone-800 rounded-md shadow-lg z-50 hidden">
                    <!-- User Info Section -->
                    <div class="p-4 border-b border-stone-200 flex justify-between items-center">
                        <div>
                            <p class="font-medium text-stone-800">My Account</p>
                            <p class="text-sm text-stone-600" id="user-email">{{ Auth::user()->email }}</p>
                        </div>
                        <button class="text-stone-500 hover:text-stone-700" id="close-user-dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg>
                        </button>
                    </div>
                    
                    <!-- Account Options for Users -->
                    <div class="py-2">
                        <a href="/profile" class="flex items-center px-4 py-3 hover:bg-stone-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-3 text-stone-600">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span>My Profile</span>
                        </a>
                        
                        <a href="/client/orders" class="flex items-center px-4 py-3 hover:bg-stone-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-3 text-stone-600">
                                <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path>
                                <path d="M3 6h18"></path>
                                <path d="M16 10a4 4 0 0 1-8 0"></path>
                            </svg>
                            <span>My Orders</span>
                        </a>
                        
                        <a href="/returns" class="flex items-center px-4 py-3 hover:bg-stone-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-3 text-stone-600">
                                <path d="m9 14-4-4 4-4"></path>
                                <path d="M5 10h11a4 4 0 1 1 0 8h-1"></path>
                            </svg>
                            <span>My Returns</span>
                        </a>

                        <a href="/listing" class="flex items-center px-4 py-3 hover:bg-stone-100">
                            <img src="https://cdn-icons-png.flaticon.com/128/2789/2789609.png" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-3 text-stone-600" alt="our products">
                            <span>Our products</span>
                        </a>
                        
                @if(Auth::user()->role->name=='Admin')
                        <a href="/admin" class="flex items-center px-4 py-3 hover:bg-stone-100">
                            <img src="https://imgs.search.brave.com/4TYTWCI1WyH_b-MDbqndlsy2u2vewEQDX84XB4A4S4M/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly90My5m/dGNkbi5uZXQvanBn/LzEwLzQxLzIzLzM0/LzM2MF9GXzEwNDEy/MzM0NDJfT1BuVnZS/YkszVENIaXNjblJV/SVdGV1dReUdtbkJz/WEwuanBn" 
                            width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-3 text-stone-600">                                
                                <path d="M5 10h11a4 4 0 1 1 0 8h-1"></path>
                            </svg>
                            <span>  Admin</span>
                        </a>
                        @endif

                        
                        <a href="/preferences" class="flex items-center px-4 py-3 hover:bg-stone-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-3 text-stone-600">
                                <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                            <span>Settings</span>
                        </a>
                        
                        <div class="border-t border-stone-200 mt-2 pt-2">
                            <a href="/logout" class="flex items-center px-4 py-3 hover:bg-stone-100 text-rose-600">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-3">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                <span>Sign Out</span>
                            </a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            
            <!-- Wishlist -->
            <a href="/wishlist" class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path>
                </svg>
            </a>
            
            <!-- Shopping Bag -->
            <a href="/cart" class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path>
                    <path d="M3 6h18"></path>
                    <path d="M16 10a4 4 0 0 1-8 0"></path>
                </svg>
            </a>
        </div>
    </div>
       
</header>

<!-- Mobile Search Overlay (Hidden by default) -->
<div class="fixed inset-0 bg-stone-900 bg-opacity-95 z-50 hidden" id="mobile-search">
    <div class="container mx-auto px-4 pt-16 pb-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-white text-xl font-medium">Search</h2>
            <button class="text-white" onclick="document.getElementById('mobile-search').classList.add('hidden')">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 6 6 18"></path>
                    <path d="m6 6 12 12"></path>
                </svg>
            </button>
        </div>
        <form action="/search" method="get">
            <div class="relative">
                <input 
                    type="text" 
                    name="q" 
                    placeholder="Search for items and brands" 
                    class="w-full py-3 px-4 pr-10 rounded-md bg-white text-stone-800 focus:outline-none"
                >
                <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-stone-500">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </svg>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle mobile search
        document.querySelector('.md\\:hidden').addEventListener('click', function() {
            document.getElementById('mobile-search').classList.remove('hidden');
        });
        
        // Profile dropdown elements
        const profileButton = document.getElementById('profile-button');
        const profileDropdown = document.getElementById('profile-dropdown');
        
        // Get the appropriate dropdown based on authentication status
        const activeDropdown = document.getElementById('guest-dropdown') || document.getElementById('user-dropdown');
        
        // Track dropdown state
        let dropdownOpen = false;
        
        // Function to show the dropdown
        function showDropdown() {
            if (activeDropdown) {
                activeDropdown.classList.remove('hidden');
                dropdownOpen = true;
            }
        }
        
        function hideDropdowns() {
            if (activeDropdown) {
                activeDropdown.classList.add('hidden');
                dropdownOpen = false;
            }
        }
        
        // Toggle on click
        profileButton.addEventListener('click', function(e) {
            e.stopPropagation();
            
            if (dropdownOpen) {
                hideDropdowns();
            } else {
                showDropdown();
            }
        });
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            // Only close if clicking outside the dropdown area
            if (!profileDropdown.contains(e.target)) {
                hideDropdowns();
            }
        });
        
        // Close button functionality
        document.getElementById('close-guest-dropdown').addEventListener('click', function(e) {
            e.stopPropagation();
            hideDropdowns();
        });
        
        document.getElementById('close-user-dropdown').addEventListener('click', function(e) {
            e.stopPropagation();
            hideDropdowns();
        });
        
        // Prevent dropdown from closing when clicking inside it
        guestDropdown.addEventListener('click', function(e) {
            e.stopPropagation();
        });
        
        userDropdown.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    });
</script>