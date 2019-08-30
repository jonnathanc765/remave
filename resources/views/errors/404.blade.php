@extends('frontend.layouts.app')

@section('title')
Carrito de Compras
@endsection

@section('cart')
active
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('vendors/linericon/style.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/nouislider/nouislider.min.css') }}">
@endsection

@section('content')

<div class="row">

    <div class="col-md-12">
        <div class="error" style="padding: 250px 20px">
            <h2 class="text-center">
                Página no encontrada
            </h2>
            <div class="col-md-12 text-center pt-4">
                <a href="{{ url()->previous() }}" class="btn btn-primary btn-lg">Volver</a>
            </div>
        </div>
    </div>

    

</div>


@endsection