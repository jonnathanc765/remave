@extends('new_dashboard.layouts.app')

@section('title')
Panel de {{ ucfirst(Auth::user()->getRoleNames()->first()) }}
@endsection

@section('dashboard_client')
active
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('vendors/charts/chartist-bundle/chartist.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/charts/morris-bundle/morris.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/charts/c3charts/c3.css') }}">
@endsection

@section('content')

<div class="dashboard-ecommerce">
    <div class="ecommerce-widget">

        <div class="row">
            
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">Ordenes Generadas</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{ $data['totalOrders'] }}</h1>
                        </div>
                    </div>
                    <div id="sparkline-revenue2"></div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">Productos Comprados (Pagados)</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{ $data['acquiredProducts'] }}</h1>
                        </div>
                    </div>
                    <div id="sparkline-revenue3"></div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">Puntos Ganados por compras</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{ Auth::user()->point }}</h1>
                        </div>
                    </div>
                    <div id="sparkline-revenue3"></div>
                </div>
            </div>
           
        </div>
        <div class="row">
            <!-- ============================================================== -->

            <!-- ============================================================== -->

            <!-- recent orders  -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Ordenes Recientes</h5>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table id="example" class="table text-center">
                                <thead class="bg-light">
                                    <tr class="border-0">
                                        <th class="border-0">#</th>
                                        <th class="border-0">Precio</th>
                                        <th class="border-0">Fecha</th>
                                        <th class="border-0">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>$ {{ $order->total }}</td>
                                        <td>{{ $order->updated_at->diffForHumans() }}</td>
                                        <td>
                                            <span class="
                                            badge-dot 
                                            {{ $order->status == 'pending'? 'badge-brand': 'badge-success' }} 
                                            mr-1
                                            "></span>
                                            {{ $order->status == 'pending'? 'Pendiente': 'Exitosa' }}
                                        </td>
                                    </tr>
                                    @endforeach
                                    <td colspan="9">
                                        <a href="{{ route('client.orders.index') }}" class="btn btn-outline-light float-right">Ver Detalles</a>
                                    </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end recent orders  -->
            <!-- ============================================================== -->
           
        </div>  
    </div>
</div>
@endsection

@section('scripts')
<!-- chart chartist js -->
<script src="{{ asset('vendors/charts/chartist-bundle/chartist.min.js') }}"></script>
<!-- sparkline js -->
<script src="{{ asset('vendors/charts/sparkline/jquery.sparkline.js') }}"></script>
<!-- morris js -->
<script src="{{ asset('vendors/charts/morris-bundle/raphael.min.js') }}"></script>
<script src="{{ asset('vendors/charts/morris-bundle/morris.js') }}"></script>
<!-- chart c3 js -->
<script src="{{ asset('vendors/charts/c3charts/c3.min.js') }}"></script>
<script src="{{ asset('vendors/charts/c3charts/d3-5.4.0.min.js') }}"></script>
<script src="{{ asset('vendors/charts/c3charts/C3chartjs.js') }}"></script>
<script src="{{ asset('js/dashboard/dashboard-ecommerce.js') }}"></script>
@endsection
