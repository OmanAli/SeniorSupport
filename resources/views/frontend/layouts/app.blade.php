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
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/mobile.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/cdnjs/ajax/libs/font-awesome/6.1.2/css/all.min.css') }}">
    <link href="{{ asset('assets/unpkg.com/aos%402.3.1/dist/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css">
    @stack('styles')
</head>

<body>
    @yield('content')
    @include('frontend.layouts.footer')
    <script src="{{ asset('assets/code.jquery.com/jquery-1.12.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/animations.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom-script.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/unpkg.com/aos%402.3.1/dist/aos.js') }}"></script>
    <script src="{{ asset('assets/js/text-animations.js') }}"></script>
    <script src="{{ asset('assets/js/carousel.js') }}"></script>
</body>

</html>
