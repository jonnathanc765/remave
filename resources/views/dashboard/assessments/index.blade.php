@extends('dashboard.layouts.app')

@section('assessments')
active
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2 class="">Valoracion de los clientes hacia los proveedores</h2>
		</div>
	</div>
	<div class="row tabla">
		<div class="col table-responsive">
			<div id="accordion">
				<div class="row tabla">
					<div class="col table-responsive">           
						<table class="table table-bordered">
							<thead>
								<th>#</th>
								<th>cliente</th>
								<th>proveedor</th>
								<th>calidad del producto</th>
								<th>tiempo de respuesta</th>
							</thead>
							<tbody>
								@foreach($assessments as $assessment)              
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $assessment->user_id }}</td>
									<td>{{ $assessment->shop_id }}</td>
									<td>{{ $assessment->product_quality }}</td>
									<td>{{ $assessment->response_time }}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>

			@endsection


