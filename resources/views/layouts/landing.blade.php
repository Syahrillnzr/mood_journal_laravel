<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Mercy – Mood Journal')</title>

    @vite([
        'resources/css/mercy_tailwind.css' ,
        'resources/css/pagedone.css',
        'resources/js/app.js',
        'resources/js/pagedone.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- ADD SWIPER CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" defer></script>

    <!-- ADD SWIPER JS (must load BEFORE your component script) -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    

    
</head>

<body class="font-body">

    {{-- Header --}}
    @include('partials.landing.nav')

    {{-- Page Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.landing.footer')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            feather.replace()
            document.getElementById('currentYear').textContent = new Date().getFullYear()
        })
    </script>
</body>
</html>
