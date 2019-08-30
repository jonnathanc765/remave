@extends('new_dashboard.layouts.app')

@section('orders.client', 'active')

@section('title')
    Lista de todas las ordenes que has realizado como cliente
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
                                <th>Estado</th>
                                <th>Tienda</th>
                                <th>Fecha de creacion</th>
                                <th>Ver</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->code }}</td>
                                <td>
                                    @if ($order->status == 'successful')
                                    <span class="badge-dot badge-success"></span> Exitosa                                        
                                    @elseif($order->status == 'failed')
                                    <span class="badge-dot badge-danger"></span> Fallido
                                    @elseif($order->status == 'pending')
                                    <span class="badge-dot badge-warning"></span> Pendiente       @elseif($order->status == 'paid')          
                                    <span class="badge-dot badge-info"></span> Pagado
                                    @endif
                                </td>
                                <td class="text-left">
                                    <img src="{{ Storage::url($order->orderDetails->first()->product->post->shop->logo) }}" alt="" class="thumbnail">
                                    {{ $order->orderDetails->first()->product->post->shop->name }}
                                </td>
                                <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <a href="{{ route('client.orders.show', ['id' => $order->code]) }}">
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
