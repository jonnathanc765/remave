@extends('frontend.layouts.app')

@section('title')
Carrito de Compras
@endsection

@section('cart')
    active
@endsection

@section('count')
    <button id="count">
        <count></count>
    </button>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('vendors/linericon/style.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/nouislider/nouislider.min.css') }}">
@endsection

@section('content')



<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive" id="app">
                <cart cart="{{ json_encode($cartItems) }}"></cart>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->

@endsection

@section('scripts')

<script src="{{ asset('js/vue/cart/bundle.js') }}"></script>

@endsection
