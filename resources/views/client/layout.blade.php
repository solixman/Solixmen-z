<!DOCTYPE html>
<html lang="en">
    <style>
        a{
            text-decoration: none;
        }
    </style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', "SOLIXMEN'z - Classy Clothing Store")</title>
    <meta name="description" content="@yield('description', 'Discover timeless fashion at SOLIXMENz. Shop our collection of high-quality, sustainable clothing for the modern individual.')">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

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
    <link rel="stylesheet" href="{{asset("css/app.css")}}">

    @yield('styles')
</head>

<body class="bg-stone-50 text-stone-800 min-h-screen flex flex-col">
    <!-- Header -->
    @include('client.partials.header')
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

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('client.partials.footer')

    <!-- Scripts -->
    @yield('scripts')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

</body>

</html>
