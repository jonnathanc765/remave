<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @if ($seo)
        @foreach ($seo as $s)
            <meta name="{{ $s->name }}" content="{{ $s->value }}">
        @endforeach
    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Remaveca') }} - @yield('title')</title>
    <link rel="icon" href="{{ asset('img/Fevicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/nice-select/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.carousel.min.css') }}">
    @yield('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <!--================ Start Header Menu Area =================-->
    @include('frontend.layouts.header')
    <!--================ End Header Menu Area =================-->


    <main class="site-main">
        @yield('content')
    </main>

    <!--================ Start footer Area  =================-->
    @include('frontend.layouts.footer')
    <!--================ End footer Area  =================-->

    <!--=================== Scripts ==========================-->
    <script src="{{ asset('vendors/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('vendors/nice-select/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('vendors/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('vendors/mail-script.js') }}"></script>
    @include('parts.sweetalert2')
    @yield('scripts')
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
