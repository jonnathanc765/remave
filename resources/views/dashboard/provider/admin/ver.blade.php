@extends('dashboard.layouts.app')

@section('providers')
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
                    <th>Nombre</th>
                    <th>DNI</th>
                    <th>email</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->dni }}</td>
                        <td>{{ $user->email }}</td>
                        
                        <form action="{{ route('provider.destroy', $user) }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <td>                    
                                <button type="submit" class="btn btn-primary"  onclick=" return confirm('seguro que quiere eliminar el Proveedor')">E</button>
                                 <a href="{{ url()->previous() }}" class="btn btn-primary">volver</a>


                    </tr>
                </tbody>
            </table>
         {{--    <a href="{{ url()->previous() }}" class="btn btn-primary">Volver</a> --}}
        </div>
    </div>
</div>
    
@endsection