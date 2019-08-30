<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="icon" href="{{ asset('img/Fevicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('vendors/fonts/circular-std/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/fonts/fontawesome/css/all.css') }}">
    <link rel="stylesheet"
    href="{{ asset('vendors/fonts/material-design-iconic-font/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/fonts/flag-icon-css/flag-icon.min.css') }}">

    <!-- Sweetalert2 CSS -->
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/dashboard/dashboard.css') }}">

    @yield('css')

    <title>{{ config('app.name') }} - Panel de {{ ucfirst(Auth::user()->getRoleNames()->first()) }} | @yield('title')</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        @include('new_dashboard.layouts.navbar')

        @include('new_dashboard.layouts.left-sidebar')

        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->

        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                @include('new_dashboard.layouts.page-header')
                @yield('content')
            </div>
            @include('new_dashboard.layouts.footer')
        </div>

        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->

    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="{{ asset('vendors/jquery/jquery-3.3.1.min.js') }}"></script>
    <!-- bootstap bundle js -->
    <script src="{{ asset('vendors/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <!-- slimscroll js -->
    <script src="{{ asset('vendors/slimscroll/jquery.slimscroll.js') }}"></script>
    <!-- Sweetalert2 JS -->
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    @include('parts.sweetalert2')
    @include('parts.datatables')
    @yield('scripts')
    <!-- main js -->
    <script src="{{ asset('js/dashboard/main.js') }}"></script>
</body>

</html>
