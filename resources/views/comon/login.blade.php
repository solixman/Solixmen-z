<!DOCTYPE html>
<html lang="en">
<style>
    a {
        text-decoration: none;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', "SOLIXMEN'z - Classy Clothing Store")</title>
    <meta name="description" content="@yield('description', 'Discover timeless fashion at SOLIXMENz. Shop our collection of high-quality, sustainable clothing for the modern individual.')">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

    <!-- Tailwind CSS -->
    <style>
        /* .active{
            text-: gold;
            /* background-color: aqua; */

        .active a {
            color: goldenrod;
        }
    </style>
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
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Additional Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @yield('styles')
</head>

@if (session('success'))
    <div class="row">
        <div class="alert alert-success">{{ session('success') }}</div>
    </div>
@endif

@if (session('error'))
    <div class="row">
        <div class="alert alert-danger">{{ session('error') }}</div>
    </div>
@endif
@if (session('welcome'))
    <div class="alert alert-success">
        {{ session('welcome') }}
    </div>
@endif

<body class="bg-stone-50 text-stone-800 min-h-screen flex flex-col">
    

    <div class="bg-white py-12 md:py-24">
      
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-md mx-auto">
                <h1 class="text-3xl font-serif text-center mb-8">Sign In</h1>

                <form method="post" action="/auth/login" class="space-y-6">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium mb-1">Email Address</label>
                        <input name="email" type="email" id="email"
                            class="w-full border-stone-300 border-2 rounded-md bg-stone-50 shadow-sm focus:border-stone-500 focus:ring-stone-500 focus:shadow-md transition-all duration-200"
                            required>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium mb-1">Password</label>
                        <input name="password" type="password" id="password"
                            class="w-full border-stone-300 border-2 rounded-md bg-stone-50 shadow-sm focus:border-stone-500 focus:ring-stone-500 focus:shadow-md transition-all duration-200"
                            required>
                    </div>

                    <div class="flex items-center justify-between">

                        <a href="/forgot-password" class="text-sm text-stone-600 hover:text-stone-900">Forgot
                            password?</a>
                    </div>

                    <button type="submit"
                        class="w-full bg-stone-800 text-white py-3 px-6 rounded-md hover:bg-stone-900 transition duration-150 ease-in-out">
                        Sign In
                    </button>
                </form>

                <div class="mt-8 text-center">
                    <p class="text-sm text-stone-600">
                        Don't have an account?
                        <a href="/register" class="text-stone-800 hover:underline">Create one</a>
                    </p>
                </div>

                <div class="mt-8">
                    <!-- <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-stone-200"></div>
                    </div>
                    <div class="relative flex justify-center">
                        <span class="bg-white px-4 text-sm text-stone-500">Or continue with</span>
                    </div>
                </div> -->

                    <!-- <div class="mt-6 grid grid-cols-2 gap-4">
                    <button class="flex justify-center items-center py-2 px-4 border border-stone-300 rounded-md hover:bg-stone-50 transition duration-150 ease-in-out">
                        <svg class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12.545 10.239v3.821h5.445c-0.712 2.315-2.647 3.972-5.445 3.972-3.332 0-6.033-2.701-6.033-6.032s2.701-6.032 6.033-6.032c1.498 0 2.866 0.549 3.921 1.453l2.814-2.814c-1.787-1.676-4.139-2.701-6.735-2.701-5.522 0-10.003 4.481-10.003 10.003s4.481 10.003 10.003 10.003c8.025 0 9.304-7.471 8.510-12.238l-7.52 0.565z"></path>
                        </svg>
                        Google
                    </button>
                    <button class="flex justify-center items-center py-2 px-4 border border-stone-300 rounded-md hover:bg-stone-50 transition duration-150 ease-in-out">
                        <svg class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"></path>
                        </svg>
                        Facebook
                    </button> -->
                </div>
            </div>
        </div>
    </div>
    </div>

    @include('client.partials.footer')
</body>
@yield('scripts')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

</html>
