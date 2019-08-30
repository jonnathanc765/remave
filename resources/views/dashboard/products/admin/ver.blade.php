@extends('dashboard.layouts.app')

@section('product')
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
        <a href="{{ url()->previous() }}" class="mb-3 btn btn-volver btn-secondary"><i class="mr-3 fas fa-arrow-left"></i>Volver</a>
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Categoria</th>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->sub_category_id }}</td>
                        <td>{{ $product->code }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>

                         <form action="{{ route('product.destroy', $product) }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <td class="text-center">                    
                                <button type="submit" class="btn btn-danger"  onclick=" return confirm('seguro que quiere eliminar el Producto')"><i class="far fa-trash-alt"></i></button>
                                 


                    </tr>
                </tbody>
            </table>
           {{--  <a href="{{ url()->previous() }}" class="btn btn-primary">Volver</a> --}}
        </div>
    </div>
</div>
    
@endsection