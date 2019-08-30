@extends('dashboard.layouts.app')

@section('orders')
    active
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="">Ordenes</h2>
        </div>
    </div>
    <div class="row tabla">
        <div class="col table-responsive">
             <table class="table table-bordered">
                <thead>
                    <th>#</th>
                    <th>Usuario</th>
                    <th>Codigo</th>
                    <th>descripcion</th>
                    <th>Producto</th>
                    <th>sub total</th>
                    <th>total</th>
                    <th>Aciones</th>        
            </table>
            <a href="{{ url()->previous() }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
</div>
    
@endsection

