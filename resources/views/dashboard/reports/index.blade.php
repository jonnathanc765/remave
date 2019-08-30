@extends('dashboard.layouts.app')

@section('title')
Reportes
@endsection

@section('reports')
active
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}" />
@endsection

@section('content')
<div class="bg-white">
    <div class="accordion" id="reports">
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="false" aria-controls="collapseTwo">
                        Todos los productos Registrados
                    </button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#reports">
                <div class="card-body">
                    <table id="DataTable" class="display">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Subcategoria</th>
                                <th>Descripcion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->subcategory->name }}</td>
                                <td>{{ $product->description }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        Todos Los usuarios registrados
                    </button>
                </h2>
            </div>

            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#reports">
                <div class="card-body">
                    <table id="DataTable" class="display">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Fecha de registro</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree"
                        aria-expanded="false" aria-controls="collapseThree">
                        Todas las ordenes
                    </button>
                </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#reports">
                <div class="card-body">
                    <table id="DataTable" class="display">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Comprador</th>
                                <th>Fecha de compra</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->code }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@section('scripts')
<script type="text/javascript" src="{{ asset('DataTables/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/dataTables.js') }}"></script>
@endsection
@endsection
