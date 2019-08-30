@extends('dashboard.layouts.app')

@section('product')
    active
@endsection

@section('title')
Productos
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Lista de productos</h2>
        </div>
    </div>

    {{-- buscador de proveedores --}}
    {!! Form::open(['route' =>'products', 'method' => 'Get', 'class' => 'navbar-form pull-rigth']) !!}
        
        <div class="row input-group my-3">
        {!! Form::text('name', null, ['class' => 'form-control form-group barra-buscar float-right', 'placelhoder' => 'Buscar products..', 'aria-describedby' => 'search']) !!}
            <button class="icono-buscar form-group btn btn-default"><i class="fas fa-search"></i></button>
        </div>
        {!! Form::close() !!}        
    
    {{-- fin del buscador de proveedores --}}
    <div class="row tabla">
        <div class="col table-responsive">

    
    <div class="row tabla">
        <div class="col table-responsive">






            <table class="table table-bordered">
                <thead>
                    <th>#</th>
                    <th>Categoria</th>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Aciones</th>
                </thead>
                <tbody>
                    @foreach( $products as $product)  
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->subcategory->name }}</td>
                        <td>{{ $product->code }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>

                        <form action="{{ route('product.destroy', $product) }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <td class="opciones-tabla text-center">
                                <a class="btn btn-info btn-xs" href="{{ route('product.show', $product) }}"><i class="far fa-eye"></i></a>
                                <button type="submit" class="btn btn-danger btn-xs"  onclick=" return confirm('seguro que quiere eliminar el Producto')"><i class="far fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        </form>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @endsection


