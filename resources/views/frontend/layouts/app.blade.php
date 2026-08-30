<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senior Support|@yield('title')</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicons/favicon.png') }}">
    <link rel="manifest" href="https://html.designingmedia.com/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('assets/images/favicons/favicon.png') }}">
    <meta name="theme-color" content="#ffffff">
    <link rel="preload" as="image" href="{{ asset('assets/images/banner-img.webp') }}" fetchpriority="high">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style"
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Open+Sans:wght@300;400;500;600;700&display=swap"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Open+Sans:wght@300;400;500;600;700&display=swap">
    </noscript>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    {{-- Non-critical CSS (icons, carousel, animation lib, mobile-only tweaks) loaded without blocking first paint --}}
    <link rel="preload" as="style" href="{{ asset('assets/css/mobile.css') }}"
        onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" as="style" href="{{ asset('assets/cdnjs/ajax/libs/font-awesome/6.1.2/css/all.min.css') }}"
        onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" as="style" href="{{ asset('assets/unpkg.com/aos%402.3.1/dist/aos.css') }}"
        onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" as="style" href="{{ asset('assets/css/owl.carousel.min.css') }}"
        onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" as="style" href="{{ asset('assets/css/owl.theme.default.min.css') }}"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{ asset('assets/css/mobile.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/cdnjs/ajax/libs/font-awesome/6.1.2/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/unpkg.com/aos%402.3.1/dist/aos.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
    </noscript>
    @stack('styles')
</head>

<body>
    @yield('content')
    @include('frontend.layouts.footer')
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/animations.js') }}" defer></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/popper.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/custom-script.js') }}" defer></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}" defer></script>
    <script src="{{ asset('assets/unpkg.com/aos%402.3.1/dist/aos.js') }}" defer></script>
    <script src="{{ asset('assets/js/text-animations.js') }}" defer></script>
    <script src="{{ asset('assets/js/carousel.js') }}" defer></script>
</body>

</html>
