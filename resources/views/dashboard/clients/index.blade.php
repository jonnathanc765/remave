@extends('dashboard.layouts.app')

@section('clients')
    active
@endsection

@section('title')
Clientes
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Lista de clientes</h2>
        </div>
    </div>




    {{-- buscador de clientes --}}
    {!! Form::open(['route' =>'clients', 'method' => 'Get', 'class' => 'navbar-form pull-rigth']) !!}
        
        <div class="row input-group my-3">
            {!! Form::text('name', null, ['class' => 'form-control form-group barra-buscar float-right', 'placeholder' => 'Busca clientes...', 'aria-describedby' => 'search']) !!}
            <button class="icono-buscar form-group btn btn-default"><i class="fas fa-search"></i></button>
        </div>
    {!! Form::close() !!}        
    
    {{-- fin del buscador de clientes --}}
    <div class="row tabla">
        <div class="col table-responsive">
            <table class="table table-bordered">
                <thead>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>DNI</th>
                    <th>e-mail</th>
                    <th>Aciones</th>
                </thead>
                <tbody>
                @foreach($users as $user) 
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="nombre-tabla">{{ $user->name }}</td>
                    <td>{{ $user->dni }}</td>
                    <td class="email-tabla">{{ $user->email }}</td>
                    <td class="opciones-tabla text-center">

                        <a class="btn btn-info btn-xs"  href="{{ route('client.show',$user) }}"><i class="far fa-eye"></i></a>
                        
                        <a class="btn btn-danger btn-xs" href="{{route('client.destroy', $user->id)}}" onclick="return confirm('seguro que quiere eliminar el cliente')"><i class="far fa-trash-alt"></i></a>
                        
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
       
@endsection
