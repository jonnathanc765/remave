@extends('new_dashboard.layouts.app')


@section('title')
Lista de todos las órdenes.
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
                <p>Ordenes creadas en {{ config('app.name') }}</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped second text-center datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Codigo de Orden</th>
                                <th>Comprador</th>
                                <th>Tienda</th>
                                <th>Cantidad de productos</th>
                                <th>Ver</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->code }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->orderDetails->first()->product->post->shop->name }}</td>
                                <td>{{ $order->orderDetails->pluck('quantity')->sum() }}</td>
                                <td>
                                    <a href="{{ route('orders.show', ['id' => $order->id]) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Codigo de Orden</th>
                                <th>Comprador</th>
                                <th>Cantidad de productos</th>
                                <th>Ver</th>
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
