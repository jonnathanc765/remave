@extends('dashboard.layouts.app')

@section('testimonies')
    active
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="">Testimonio de {{ $testimonie->client->name }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    
                   
                    <th>testimonio</th>

                </thead>
                <tbody>
                    <tr>
                        <td>{{$testimonie->testimonie}}</td>
                        
                       {{--  <td>{{ $order->state }}</td> --}}
                    </tr>
                </tbody>
            </table>
             <form action="{{ route('testimonie.destroy', $testimonie) }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <td>                    
                                <button type="submit" class="btn btn-primary"  onclick=" return confirm('seguro que quiere eliminar el Testimonio')">Eliminar</button>
            <a href="{{ url()->previous() }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
</div>
    
@endsection