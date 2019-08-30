@extends('dashboard.layouts.app')

@section('payment')
 active
@endsection

@section('title')
Administración de Pago
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2 class="">Administracion de Pago</h2>
		</div>
	</div>
	<div class="row tabla">
		<div class="col table-responsive">

			<form action="{{ route('payment.store') }}" method="POST">
				{{ csrf_field() }}
				<div class="form-group col-md-6">
					<label for="value">Saldo Disponible:</label>
					<tr class="form-control"  rows="2">15000$</tr>
					{{-- <p>Comision Actual: <strong>{{ $config['Comision'] }}%</strong></p> --}}
				</div>
				
				<div class="form-group col-md-6">
					<label for="value">Cambiar Comision</label>
					<textarea class="form-control" id="value" name="value" rows="1">{{ old('value') }}</textarea>
				</div>
				<div class="form-group ml-3">
					<button class="btn btn-primary" type="submit">Actualizar</button>
				
				</form>
			</div>
		</div>
		@endsection
			