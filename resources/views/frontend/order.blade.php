@extends('layouts.frontend.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center mt-4 mb-4">Producto insuficiente</h2>
            <p class="mt-4 mb-4">Lamentablemente debemos informarte que el producto {{ $producto_none->name }} se ha agotado de nuestra existencia, se ha eliminado la orden actual por favor intente de nuevo</p>
            
        </div>
    </div>
</div>

    
@endsection