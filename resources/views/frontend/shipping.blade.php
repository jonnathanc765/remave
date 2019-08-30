@extends('frontend.layouts.app')

@section('home')
active
@endsection

@section('title')
    Envios
@endsection

@section('content')

    <div class="container-fluid mt-4 mb-4">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Como comprar un producto</h2>
            </div>

            <div class="col-md-12 mt-4">
                <img src="{{ asset('img/banners/ENVIO GRATIS-01.jpg') }}" alt="" width="100%">
            </div>

            <div class="col-md-12 mt-4">
                <img src="{{ asset('img/banners/ENVIO GRATIS-02.jpg') }}" alt="" width="100%">
            </div>

            <div class="col-md-12 mt-4">
                <img src="{{ asset('img/banners/ENVIO GRATIS-03.jpg') }}" alt="" width="100%">
            </div>
        

            
        </div>
    </div>

@endsection