@extends('frontend.layouts.app')

@section('title')
Publicaciones
@endsection

@section('posts')
active
@endsection

@section('content')<div class="container">
    <section class="section-margin calc-60px">
        <div class="section-intro pb-60px">
            <p>Resultados de su busqueda para</p>
            <h2><span class="section-intro__style">{{ $query }}</span></h2>
        </div>
        <div class="row">
            @each('frontend.parts._product-card', $products, 'product')
        </div>
        <div class="row d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </section>
</div>

@endsection
