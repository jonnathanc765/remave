@extends('new_dashboard.layouts.app')

@section('products')
active
@endsection

@section('products', 'active')
    
@section('title')
Lista de todos los productos.
@endsection

@section('content')

<div class="row">
    <!-- ============================================================== -->
    <!-- data table  -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">@yield('title')</h5>
                <p>Productos disponibles en {{ config('app.name') }}</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered second datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Categoria</th>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->subcategory->name }}</td>
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Categoria</th>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end data table  -->
    <!-- ============================================================== -->
</div>

@endsection

@include('parts.datatables')
