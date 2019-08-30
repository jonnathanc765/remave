@extends('new_dashboard.layouts.app')

@section('title', 'Lista de todos los clientes')

@section('users','active')

@section('content')


    <!-- ============================================================== -->
	<!-- content  -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- influencer profile  -->
	<!-- ============================================================== -->
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="card influencer-profile-data">
				<div class="card-body">
					<div class="row">
						<div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
							<div class="text-center">
								<img src="{{ Storage::url($user->avatar) }}" alt="User Avatar" class="rounded-circle user-avatar-xxl">
								</div>
							</div>
							<div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-12">
								<div class="user-avatar-info">
									<div class="m-b-20">
										<div class="user-avatar-name">
											<h2 class="mb-1">{{ $user->name }}</h2>
										</div>
										<div class="rating-star  d-inline-block">
											<i class="fa fa-fw fa-star"></i>
											<i class="fa fa-fw fa-star"></i>
											<i class="fa fa-fw fa-star"></i>
											<i class="fa fa-fw fa-star"></i>
											<i class="fa fa-fw fa-star"></i>
											<p class="d-inline-block text-dark">14 Reviews </p>
										</div>
									</div>
									<!--  <div class="float-right"><a href="#" class="user-avatar-email text-secondary">www.henrybarbara.com</a></div> -->
									<div class="user-avatar-address">
										<p class="pb-3">
											<span class="d-xl-inline-block d-block mb-2"><i class="fa fa-map-marker-alt mr-2 text-primary "></i>{{ $user->address }}</span>
											<span class="mb-2 ml-xl-4 d-xl-inline-block d-block">Fecha de unión: {{ $user->created_at->format('d M, Y') }}  </span>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- end influencer profile  -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- widgets   -->
		<!-- ============================================================== -->
		<div class="row">
			<!-- ============================================================== -->
			<!-- four widgets   -->
			<!-- ============================================================== -->
			<!-- ============================================================== -->
			<!-- total views   -->
			<!-- ============================================================== -->
			<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
				<div class="card">
					<div class="card-body">
						<div class="d-inline-block">
							<h5 class="text-muted">Numero de Órdenes totales</h5>
							<h2 class="mb-0">{{ $data->totalOrders }}</h2>
						</div>
						<div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
							<i class="fas fa-boxes fa-fw fa-sm text-info"></i>
						</div>
					</div>
				</div>
			</div>
			<!-- ============================================================== -->
			<!-- end total views   -->
			<!-- ============================================================== -->
			<!-- ============================================================== -->
			<!-- total followers   -->
			<!-- ============================================================== -->
			<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
				<div class="card">
					<div class="card-body">
						<div class="d-inline-block">
							<h5 class="text-muted">Total gastado en compras</h5>
							<h2 class="mb-0">${{ $data->totalOrdersMoney }}</h2>
						</div>
						<div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
							<i class="fas fa-money-bill-wave fa-fw fa-sm text-primary"></i>
						</div>
					</div>
				</div>
			</div>
			<!-- ============================================================== -->
			<!-- end total followers   -->
			<!-- ============================================================== -->
			<!-- ============================================================== -->
			<!-- partnerships   -->
			<!-- ============================================================== -->
			<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
				<div class="card">
					<div class="card-body">
						<div class="d-inline-block">
							<h5 class="text-muted">Numero de productos comprados</h5>
							<h2 class="mb-0">{{ $data->totalProductOrdered }}</h2>
						</div>
						<div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
							<i class="fas fa-drumstick-bite fa-fw fa-sm text-secondary"></i>
						</div>
					</div>
				</div>
			</div>
			<!-- ============================================================== -->
			<!-- end partnerships   -->
			<!-- ============================================================== -->
			<!-- ============================================================== -->
			<!-- total earned   -->
			<!-- ============================================================== -->
			<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
				<div class="card">
					<div class="card-body">
						<div class="d-inline-block">
							<h5 class="text-muted">Pedido mas costoso del cliente</h5>
							<h2 class="mb-0"> ${{ $data->mostExpensiveOrder }}</h2>
						</div>
						<div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
							<i class="fa fa-money-bill-alt fa-fw fa-sm text-brand"></i>
						</div>
					</div>
				</div>
			</div>
			<!-- ============================================================== -->
			<!-- end total earned   -->
			<!-- ============================================================== -->
		</div>
		<!-- ============================================================== -->
		<!-- end widgets   -->
		<!-- ============================================================== -->
		<div class="row">
			<!-- ============================================================== -->
			<!-- campaign activities   -->
			<!-- ============================================================== -->
			<div class="col-lg-12">
				<div class="section-block">
					<h3 class="section-title">Lista de órdenes</h3>
				</div>


				<div class="card">
					<h5 class="card-header">Mas recientes</h5>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover first text-center" id="products">
								<thead>
									<tr>
										<th>Código</th>
										<th>Cant. Productos</th>
										<th>Total</th>
										<th>Fecha</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($data->orders as $order)
									<tr>
										<td>{{ $order->code }}</td>
										<td>{{ $order->TotalProducts }}</td>
										<td>$ {{ $order->total }}</td>
										<td>{{ $order->created_at->format('d M, Y') }}</td>
										<td>
											<a href="{{ route('orders.show', $order) }}" class="btn btn-primary btn-rounded">Ver</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
					
				
			</div>
			<!-- ============================================================== -->
			<!-- end campaign activities   -->
			<!-- ============================================================== -->
		</div>
		<!-- ============================================================== -->
		<!-- end content  -->
		<!-- ============================================================== -->


@endsection

@include('parts.datatables')

@section('scripts')
	<script>
		$(document).ready( function () {
			$('#products').DataTable();
		});
	</script>
@endsection
ç