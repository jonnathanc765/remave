@extends('dashboard.layouts.app')

@section('providers')
    active
@endsection

@section('title')
Proveedores
@endsection



@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center mb-3">Lista de Provedores</h2>
        </div>
    </div>
    <div class="row tabla">
        <div class="col table-responsive">
            

{{-- buscador de proveedores --}}
{!! Form::open(['route' =>'providers', 'method' => 'Get', 'class' => 'navbar-form pull-rigth']) !!}
    <div class="input-group my-3">
        {!! Form::text('name', null, ['class' => 'form-control form-group barra-buscar float-right', 'placeholder' => 'Buscar proveedores..', 'aria-describedby' => 'search']) !!}
        <button class="icono-buscar form-group btn btn-default"><i class="fas fa-search"></i></button>
    </div>
{!! Form::close() !!}        

{{-- fin del buscador de proveedores --}}

            <table class="table table-bordered">
                <thead>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>DNI</th>
                    <th>email</th>
                    <th>Aciones</th>
                </thead>
                <tbody>
                @foreach( $users as $user)  
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="nombre-tabla">{{ $user->name }}</td>
                    <td>{{ $user->dni }}</td>
                    <td class="email-tabla">{{ $user->email }}</td>
                    <td class="opciones-tabla text-center">
                        <a class="btn btn-info btn-xs" href="{{ route('provider.show', $user) }}"><i class="far fa-eye"></i></a>

                        <a class="btn btn-danger btn-xs" href="{{ route('provider.destroy', $user->id) }}" onclick=" return confirm('seguro que quiere eliminar el Proveedor')"><i class="far fa-trash-alt"></i></a>
                        
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
       
@endsection