<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ELEGANCE Admin - @yield('admin-title', 'Dashboard')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    },
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
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .admin-sidebar {
            height: 100vh;
            position: sticky;
            top: 0;
        }
    </style>

    @yield('styles')

</head>

<body class="bg-stone-50 text-stone-800">
    <!-- Mobile Header - Only visible on mobile -->
    <div class="md:hidden bg-stone-800 text-white p-4 w-full fixed top-0 left-0 right-0 z-10 flex justify-between items-center">
        <h2 class="font-serif text-xl">ELEGANCE</h2>
        <button id="mobile-menu-button" class="text-white focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden fixed top-16 left-0 right-0 bg-stone-800 text-white z-50">
        <nav class="p-4 space-y-1">
            <a href="/admin"
                class="block py-2.5 px-4 rounded transition @if (request()->routeIs('admin.dashboard')) bg-stone-700 @else hover:bg-stone-700 @endif">
                Dashboard
            </a>
            <a href="/admin/products"
                class="block py-2.5 px-4 rounded transition @if (request()->routeIs('admin.products*')) bg-stone-700 @else hover:bg-stone-700 @endif">
                Products
            </a>
            <a href="/admin/orders"
                class="block py-2.5 px-4 rounded transition @if (request()->routeIs('admin.orders*')) bg-stone-700 @else hover:bg-stone-700 @endif">
                Orders
            </a>
            <a href="/admin/customers"
                class="block py-2.5 px-4 rounded transition @if (request()->routeIs('admin.customers*')) bg-stone-700 @else hover:bg-stone-700 @endif">
                Customers
            </a>
            <a href="/logout" class="block py-2.5 px-4 rounded transition hover:bg-stone-700">
                Logout
            </a>
        </nav>
    </div>

    <!-- Main Layout - Flex container -->
    <div class="flex min-h-screen">
        <!-- Admin Sidebar -->
        <aside class="admin-sidebar w-64 bg-stone-800 text-white hidden md:block flex-shrink-0">
            <div class="p-6">
                <h2 class="font-serif text-xl mb-6">SOLIXMEN'z</h2>
                <nav class="space-y-1">
                    <a href="/admin"
                        class="block py-2.5 px-4 rounded transition @if (request()->routeIs('admin.dashboard')) bg-stone-700 @else hover:bg-stone-700 @endif">
                        Dashboard
                    </a>
                    <a href="/admin/products"
                        class="block py-2.5 px-4 rounded transition @if (request()->routeIs('admin.products*')) bg-stone-700 @else hover:bg-stone-700 @endif">
                        Products
                    </a>
                    <a href="/admin/orders"
                        class="block py-2.5 px-4 rounded transition @if (request()->routeIs('admin.orders*')) bg-stone-700 @else hover:bg-stone-700 @endif">
                        Orders
                    </a>
                    <a href="/admin/customers"
                        class="block py-2.5 px-4 rounded transition @if (request()->routeIs('admin.customers*')) bg-stone-700 @else hover:bg-stone-700 @endif">
                        Customers
                    </a>
                    <a href=""
                        class="block py-2.5 px-4 rounded transition @if (request()->routeIs('admin.settings*')) bg-stone-700 @else hover:bg-stone-700 @endif">
                        Settings
                    </a>
                </nav>
            </div>
            <div class="absolute bottom-0 left-0 right-0 p-6">
                <a href="/logout"
                    class="block py-2.5 px-4 text-stone-300 hover:text-white hover:bg-stone-700 rounded transition">
                    Logout
                </a>

                <a href="/"
                    class="block py-2.5 px-4 text-stone-300 hover:text-white hover:bg-stone-700 rounded transition">
                    Client view
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 w-full p-6 md:p-8 md:mt-0 mt-16">
            @if (session('success'))
                <div class="mb-4">
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">{{ session('success') }}</div>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4">
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">{{ session('error') }}</div>
                </div>
            @endif
            
            <div class="mb-6">
                <h1 class="text-3xl font-serif">@yield('admin-title', 'Dashboard')</h1>
            </div>
            
            @yield('admin-content')
        </main>
    </div>

    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>

    @yield('scripts')
</body>

</html>