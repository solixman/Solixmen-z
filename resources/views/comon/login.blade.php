<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', "SOLIXMEN'z - Classy Clothing Store")</title>
    <meta name="description" content="@yield('description', 'Discover timeless fashion at SOLIXMENz. Shop our collection of high-quality, sustainable clothing for the modern individual.')">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
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
                    fontFamily: {
                        serif: ['Playfair Display', 'serif'],
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* Additional custom styles */
        .transition {
            transition: all 0.2s ease-in-out;
        }
        
        input:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(41, 37, 36, 0.2);
        }
        
        .btn-primary {
            @apply bg-stone-800 text-white py-3 px-6 rounded-md hover:bg-stone-900 transition;
        }
        
        .alert-success {
            bg-green-50 text-green-800 border border-green-200 p-4 rounded-md mb-6;
        }
        
        .alert-danger {
            @apply bg-red-50 text-red-800 border border-red-200 p-4 rounded-md mb-6;
        }
        </style>
        @yield('styles')
</head>

<body class="bg-stone-50 text-stone-800 min-h-screen flex flex-col">
    <!-- Alert Messages -->
    @if (session('success'))
    <div class="container mx-auto px-4 mt-4">
        <div class="alert-success">{{ session('success') }}</div>
    </div>
    @endif

    @if (session('error'))
    <div class="container mx-auto px-4 mt-4">
        <div class="alert-danger">{{ session('error') }}</div>
    </div>
    @endif

    @if (session('welcome'))
    <div class="container mx-auto px-4 mt-4">
        <div class="alert-success">{{ session('welcome') }}</div>
    </div>
    @endif

    <!-- Breadcrumb Navigation -->
    <div class="container mx-auto px-4 py-4">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/" class="inline-flex items-center text-sm font-medium text-stone-600 hover:text-stone-900">
                        <svg class="w-3 h-3 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                        Home
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-stone-400 mx-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-sm font-medium text-stone-500 ml-1 md:ml-2">Login</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center py-8 px-4">
        <div class="w-full max-w-md">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-8">
                    <div class="text-center mb-8">
                        <h1 class="text-3xl font-serif font-medium text-stone-800">Welcome Back</h1>
                        <p class="text-stone-500 mt-2">Sign in to your SOLIXMEN'z account</p>
                    </div>

                    <!-- Login Form -->
                    <form method="post" action="/auth/login" class="space-y-5">
                        @csrf
                        
                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-medium text-stone-700">Email Address</label>
                            <input 
                                name="email" 
                                type="email" 
                                id="email" 
                                placeholder="your@email.com"
                                class="w-full px-3 py-2 border-2 border-stone-300 rounded-md bg-white focus:border-stone-500 transition"
                                required
                            >
                        </div>

                        <div class="space-y-2">
                            <div class="flex items-center justify-between">
                                <label for="password" class="block text-sm font-medium text-stone-700">Password</label>
                                <a href="/forgot-password" class="text-xs text-stone-600 hover:text-stone-900 hover:underline">
                                    Forgot password?
                                </a>
                            </div>
                            <input 
                                name="password" 
                                type="password" 
                                id="password" 
                                placeholder="••••••••"
                                class="w-full px-3 py-2 border-2 border-stone-300 rounded-md bg-white focus:border-stone-500 transition"
                                required
                            >
                        </div>

                        <div class="pt-2">
                            <button 
                                type="submit"
                                class="w-full bg-stone-800 hover:bg-stone-900 text-white font-medium py-3 px-6 rounded-md transition"
                            >
                                Sign In
                            </button>
                        </div>
                    </form>

                    <div class="mt-8 text-center">
                        <p class="text-sm text-stone-600">
                            Don't have an account?
                            <a href="/register" class="text-stone-800 font-medium hover:underline inline-flex items-center">
                                Create one
                                <!-- Arrow Right Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-1 h-3 w-3">
                                    <path d="M5 12h14"></path>
                                    <path d="m12 5 7 7-7 7"></path>
                                </svg>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer (included from partials) -->
    @include('client.partials.footer')

   
</body>
</html>