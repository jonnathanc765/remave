@extends('dashboard.layouts.app')

@section('orders')
    active
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class=""></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Usuario</th>
                    <th>Codigo</th>
                    <th>Fecha</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user_id }}</td>
                        <td>{{ $order->code }}</td>
                        <td>{{ $order->post_id}}</td>
                        
                       {{--  <td>{{ $order->state }}</td> --}}
                    </tr>
                </tbody>
            </table>
            <a href="{{ url()->previous() }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
</div>
    
@endsection