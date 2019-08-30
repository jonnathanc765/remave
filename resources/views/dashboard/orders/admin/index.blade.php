@extends('dashboard.layouts.app')

@section('orders')
    active
@endsection

@section('title')
Ordenes
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

{{-- buscador de Ordenes --}}
{!! Form::open(['route' =>'orders', 'method' => 'Get', 'class' => 'navbar-form pull-rigth']) !!}
    
    <div class="row input-group my-3">
        {!! Form::text('name', null, ['class' => 'form-control form-group barra-buscar float-right', 'placeholder' => 'Buscar ordenes..', 'aria-describedby' => 'search']) !!}
        <button class="icono-buscar form-group btn btn-default"><i class="fas fa-search"></i></button>
    </div>
{!! Form::close() !!}        

{{-- fin del buscador de Ordenes --}}

            <table class="table table-bordered">
                <thead>
                    <th>#</th>
                    <th>Usuario</th>
                    <th>Codigo</th>
                    <th>Aciones</th> 
                </thead>
                <tbody>
                    @foreach( $orders as $order)  
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $order->user_id }}</td>
                        <td>{{ $order->code }}</td>
                        <td><a class="btn btn-success btn-xs" href="{{ route('order.show', $order) }}"><i class="far fa-eye"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div> 
@endsection
