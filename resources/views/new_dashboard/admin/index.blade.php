@extends('new_dashboard.layouts.app')

@section('title')
Panel de {{ ucfirst(Auth::user()->getRoleNames()->first()) }}
@endsection

@section('dashboard')
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
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">Ventas Ultimo Mes</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">${{ $lastMonthRevenue->sum() }}</h1>
                        </div>
                        {{-- <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                            <span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.86%</span>
                        </div> --}}
                    </div>
                    <div id="sparkline-revenue"></div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">Ventas Ultimo Año</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">${{ $lastYearRevenue->sum() }}</h1>
                        </div>
                        {{-- <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                            <span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.86%</span>
                        </div> --}}
                    </div>
                    <div id="sparkline-revenue2"></div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">P. vendidos ultimo mes</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{ $sellProductsInLastMonth->sum() }}</h1>
                        </div>
                        {{-- <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                            <span>N/A</span>
                        </div> --}}
                    </div>
                    <div id="sparkline-revenue3"></div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted text-truncate">Promedio de ganancias por proveedor</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">${{ round($avgRevenuePerProvider->avg(), 2) }}</h1>
                        </div>
                        {{-- <div class="metric-label d-inline-block float-right text-secondary font-weight-bold">
                            <span>-2.00%</span>
                        </div> --}}
                    </div>
                    <div id="sparkline-revenue4"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- recent orders  -->
            <!-- ============================================================== -->
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Ordenes mas recientes</h5>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Comprador</th>
                                        <th>Productos</th>
                                        <th>Codigo de Orden</th>
                                        <th>Ver</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>{{ $order->orderDetails->pluck('quantity')->sum() }}</td>
                                        <td>{{ $order->code }}</td>
                                        <td>
                                            <a href="{{ route('orders.show', ['id' => $order->id]) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer pb-5">
                            <a href="{{ route('orders.index') }}" class="btn btn-outline-light float-right">Ver Detalles</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end recent orders  -->
            <!-- ============================================================== -->


            <!-- ============================================================== -->
            <!-- customer acquistion  -->
            <!-- ============================================================== -->
            {{-- <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Customer Acquisition</h5>
                    <div class="card-body">
                        <div class="ct-chart ct-golden-section" style="height: 354px;"></div>
                        <div class="text-center">
                            <span class="legend-item mr-2">
                                <span class="fa-xs text-primary mr-1 legend-tile"><i
                                        class="fa fa-fw fa-square-full"></i></span>
                                <span class="legend-text">Returning</span>
                            </span>
                            <span class="legend-item mr-2">

                                <span class="fa-xs text-secondary mr-1 legend-tile"><i
                                        class="fa fa-fw fa-square-full"></i></span>
                                <span class="legend-text">First Time</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- ============================================================== -->
            <!-- end customer acquistion  -->
            <!-- ============================================================== -->
        </div>
        <div class="row">
            <!-- ============================================================== -->
            <!-- product category  -->
            <!-- ============================================================== -->
            {{-- <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Productos por categoria</h5>
                    <div class="card-body">
                        <div class="ct-chart-category ct-golden-section" style="height: 315px;"></div>
                        <div class="text-center m-t-40">
                            <span class="legend-item mr-3">
                                <span class="fa-xs text-primary mr-1 legend-tile"><i
                                        class="fa fa-fw fa-square-full "></i></span><span class="legend-text">Man</span>
                            </span>
                            <span class="legend-item mr-3">
                                <span class="fa-xs text-secondary mr-1 legend-tile"><i
                                        class="fa fa-fw fa-square-full"></i></span>
                                <span class="legend-text">Woman</span>
                            </span>
                            <span class="legend-item mr-3">
                                <span class="fa-xs text-info mr-1 legend-tile"><i
                                        class="fa fa-fw fa-square-full"></i></span>
                                <span class="legend-text">Accessories</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- ============================================================== -->
            <!-- end product category  -->
            <!-- product sales  -->
            <!-- ============================================================== -->
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <!-- <div class="float-right">
                                            <select class="custom-select">
                                                <option selected>Today</option>
                                                <option value="1">Weekly</option>
                                                <option value="2">Monthly</option>
                                                <option value="3">Yearly</option>
                                            </select>
                                        </div> -->
                        <h5 class="mb-0">Ventas por Trimestre</h5>
                    </div>
                    <div class="card-body">
                        <div class="ct-chart-product ct-golden-section"></div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end product sales  -->
            <!-- ============================================================== -->
            <div class="col-md-6 col-sm-12 col-12">
                <!-- ============================================================== -->
                <!-- top perfomimg  -->
                <!-- ============================================================== -->
                <div class="card">
                    <h5 class="card-header">Tiendas Top</h5>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table id="example" class="table">
                                <thead class="bg-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Tienda</th>
                                        <th>Propietario</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bestSeller as $shop)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $shop->name }}</td>
                                        <td>{{ $shop->user->name }}</td>
                                        <td>
                                            <a href="{{ route('provider.show', ['id' => $shop->user->id]) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end top perfomimg  -->
                <!-- ============================================================== -->
            </div>
        </div>

        <div class="row">
            <!-- ============================================================== -->
            <!-- sales  -->
            <!-- ============================================================== -->
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top border-top-primary">
                    <div class="card-body">
                        <h5 class="text-muted">Ventas</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">${{ $totalRevenue->sum() }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end sales  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- new customer  -->
            <!-- ============================================================== -->
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top border-top-primary">
                    <div class="card-body">
                        <h5 class="text-muted">Nuevos Clientes</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{ $newCustomers }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end new customer  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- visitor  -->
            <!-- ============================================================== -->
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top border-top-primary">
                    <div class="card-body">
                        <h5 class="text-muted">Nuevas Tiendas</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{ $newShops }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end visitor  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- total orders  -->
            <!-- ============================================================== -->
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top border-top-primary">
                    <div class="card-body">
                        <h5 class="text-muted">Total Ordenes</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{ $totalOrders }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end total orders  -->
            <!-- ============================================================== -->
        </div>
        <div class="row">
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- category revenue  -->
            <!-- ============================================================== -->
            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Ventas por Categoria</h5>
                    <div class="card-body">
                        <div id="c3chart_category" style="height: 420px;"></div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end category revenue  -->
            <!-- ============================================================== -->

            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header"> Ventas Totales</h5>
                    <div class="card-body">
                        <div id="morris_totalrevenue"></div>
                    </div>
                    <div class="card-footer">
                        <p class="display-7 font-weight-bold">
                            <span
                                class="text-primary d-inline-block">
                                ${{ $totalRevenueGrapth->pluck('y')->sum() }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- ============================================================== -->
            <!-- recent orders  -->
            <!-- ============================================================== -->
            <div class="col-6">
                <div class="card">
                    <h5 class="card-header">Top {{ $clientsOrders->count() }} Clientes que más compran</h5>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table" class="text-center">
                                <thead class="bg-light">
                                    <tr>
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Correo</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clientsOrders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->user->name }}</td>
                                        
                                        <td>{{ $order->user->email }}</td>
                                        <td>
                                            <a href="{{ route('clients.show', ['id' => $order->user->id]) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                 
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
            <!-- ============================================================== -->
            <!-- recent orders  -->
            <!-- ============================================================== -->
            <div class="col-6">
                <div class="card">
                    <h5 class="card-header">Top {{ $bestSeller->count() }} Vendedores que mas venden</h5>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table id="example" class="table">
                                <thead class="bg-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Tienda</th>
                                        <th>Propietario</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bestSeller as $shop)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $shop->name }}</td>
                                        <td>{{ $shop->user->name }}</td>
                                        <td>
                                            <a href="{{ route('provider.show', ['id' => $shop->user->id]) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
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

            <!-- ============================================================== -->
            <!-- recent orders  -->
            <!-- ============================================================== -->
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Clientes con mas puntos</h5>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead class="bg-light">
                                    <tr>
                                        <th>#</th>
                                        <th>DNI</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Cant. de puntos</th>
                                        <th>Ver</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mostPointUser as $user)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $user->dni }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->point }}</td>
                                        <td>
                                            <a href="{{ route('clients.show', $user) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer pb-5">
                            <a href="{{ route('orders.index') }}" class="btn btn-outline-light float-right">Ver Detalles</a>
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
<script src="{{ asset('DataTables/datatables.js') }}"></script>
<script src="{{ asset('js/dashboard/DataTables.js') }}"></script>
<script>
    // ============================================================== 
    // Revenue Cards
    // ============================================================== 
    $("#sparkline-revenue").sparkline({{ $lastMonthRevenue }}, {
        type: 'line',
        width: '99.5%',
        height: '100',
        lineColor: '#5969ff',
        fillColor: '#dbdeff',
        lineWidth: 2,
        spotColor: undefined,
        minSpotColor: undefined,
        maxSpotColor: undefined,
        highlightSpotColor: undefined,
        highlightLineColor: undefined,
        resize: true
    });


    $("#sparkline-revenue2").sparkline({{ $lastYearRevenue }}, {
        type: 'line',
        width: '99.5%',
        height: '100',
        lineColor: '#ff407b',
        fillColor: '#ffdbe6',
        lineWidth: 2,
        spotColor: undefined,
        minSpotColor: undefined,
        maxSpotColor: undefined,
        highlightSpotColor: undefined,
        highlightLineColor: undefined,
        resize: true
    });


    $("#sparkline-revenue3").sparkline({{ $sellProductsInLastMonth }}, {
        type: 'line',
        width: '99.5%',
        height: '100',
        lineColor: '#25d5f2',
        fillColor: '#dffaff',
        lineWidth: 2,
        spotColor: undefined,
        minSpotColor: undefined,
        maxSpotColor: undefined,
        highlightSpotColor: undefined,
        highlightLineColor: undefined,
        resize: true
    });


    $("#sparkline-revenue4").sparkline(@json($avgRevenuePerProvider), {
        type: 'line',
        width: '99.5%',
        height: '100',
        lineColor: '#fec957',
        fillColor: '#fff2d5',
        lineWidth: 2,
        spotColor: undefined,
        minSpotColor: undefined,
        maxSpotColor: undefined,
        highlightSpotColor: undefined,
        highlightLineColor: undefined,
        resize: true,
    });

    
    // ============================================================== 
    // Product Category
    // ============================================================== 
    var chart = new Chartist.Pie('.ct-chart-category', {
        series: [1, 2, 6, 3, 7],
    }, {
        donut: true,
        showLabel: true,
        donutWidth: 40

    });


    chart.on('draw', function(data) {
        if (data.type === 'slice') {
            // Get the total path length in order to use for dash array animation
            var pathLength = data.element._node.getTotalLength();

            // Set a dasharray that matches the path length as prerequisite to animate dashoffset
            data.element.attr({
                'stroke-dasharray': pathLength + 'px ' + pathLength + 'px'
            });

            // Create animation definition while also assigning an ID to the animation for later sync usage
            var animationDefinition = {
                'stroke-dashoffset': {
                    id: 'anim' + data.index,
                    dur: 1000,
                    from: -pathLength + 'px',
                    to: '0px',
                    easing: Chartist.Svg.Easing.easeOutQuint,
                    // We need to use `fill: 'freeze'` otherwise our animation will fall back to initial (not visible)
                    fill: 'freeze'
                }
            };

            // If this was not the first slice, we need to time the animation so that it uses the end sync event of the previous animation
            if (data.index !== 0) {
                animationDefinition['stroke-dashoffset'].begin = 'anim' + (data.index - 1) + '.end';
            }

            // We need to set an initial value before the animation starts as we are not in guided mode which would do that for us
            data.element.attr({
                'stroke-dashoffset': -pathLength + 'px'
            });

            // We can't use guided mode as the animations need to rely on setting begin manually
            // See http://gionkunz.github.io/chartist-js/api-documentation.html#chartistsvg-function-animate
            data.element.animate(animationDefinition, false);
        }
    });

    // For the sake of the example we update the chart every time it's created with a delay of 8 seconds
    

        
    // ============================================================== 
    // Total Revenue
    // ============================================================== 
    Morris.Area({
        element: 'morris_totalrevenue',
        behaveLikeLine: true,
        data: @json($totalRevenueGrapth),
        xkey: ['x'],
        ykeys: ['y'],
        labels: ['Ventas'],
        lineColors: ['#5969ff'],
        resize: true

    });

    // ============================================================== 
    // Revenue By Categories
    // ============================================================== 

    var chart = c3.generate({
        bindto: "#c3chart_category",
        data: {
            columns: @json($productsPerCategory),
            type: 'donut',

            onclick: function(d, i) { console.log("onclick", d, i); },
            onmouseover: function(d, i) { console.log("onmouseover", d, i); },
            onmouseout: function(d, i) { console.log("onmouseout", d, i); },

            colors: {
                Men: '#5969ff',
                Women: '#ff407b',
                Accessories: '#25d5f2',
                Children: '#ffc750',
                Apperal: '#2ec551',



            }
        },
        donut: {
            label: {
                show: false
            }
        },



    });

    // ============================================================== 
    // Product Sales
    // ============================================================== 
    $(function () {
     "use strict";

     new Chartist.Bar('.ct-chart-product', {
         labels: @json($productSales->quarters),
         series: [
             @json($productSales),
         ],
     }, {
         stackBars: true,
         axisY: {
             labelInterpolationFnc: function (value) {
                 return (value / 1000) + 'k';
             }
         }
     }).on('draw', function (data) {
         if (data.type === 'bar') {
             data.element.attr({
                 style: 'stroke-width: 40px'
             });
         }
     });
 });



</script>

@endsection
