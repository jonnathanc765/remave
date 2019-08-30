@extends('dashboard.layouts.app')

@section('title')
Dashboard
@endsection

@section('administrator')
active
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/estilostabla.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}" />
@endsection

@section('content')
<div class="bg-white">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header text-center">
                    Registros en los Ultimos 30 Dias
                </div>
                <div class="card-body">
                    {!! $LastestRegistrations->container() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row m-2">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <table class="display tabla table-responsive">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th class="tabla-fecha">Fecha de registro</th>
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
    </div>
    <div class="row pt-5 m-2">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    Productos por Subcategoria
                </div>
                <div class="car-body">
                    {!! $productsPerCategory->container() !!}
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    Provedores y sus ventas en el ultimo mes
                </div>
                <div class="card-body">
                    {!! $bestSellers->container() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>



{!! $LastestRegistrations->script() !!}
{!! $productsPerCategory->script() !!}
{!! $bestSellers->script() !!}
<script type="text/javascript" src="{{ asset('DataTables/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/dataTables.js') }}"></script>
@endsection
@endsection
