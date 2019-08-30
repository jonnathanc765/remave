@extends('dashboard.layouts.app')

@section('social')
active
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2 class="">Control de Redes Sociales</h2>
		</div>
	</div>
	<div class="row tabla">
		<div class="col table-responsive">

			<form action="{{ route('payment.store') }}" method="POST">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="">Facebook</label>
					<textarea class="form-control" id="value" name="value" rows="1">{{ old('value') }}</textarea> 
				</div>
				
				<div class="form-group col-md-6">
					<label for="value">Instragram</label>
					<textarea class="form-control" id="value" name="value" rows="1">{{ old('value') }}</textarea>
				</div>
				<div class="form-group col-md-6">
					<label for="value">Instragram</label>
					<textarea class="form-control" id="value" name="value" rows="1">{{ old('value') }}</textarea>
				</div>
				<div class="form-group col-md-6">
					<label for="value">Instragram</label>
					<textarea class="form-control" id="value" name="value" rows="1">{{ old('value') }}</textarea>
				</div>
				<div class="form-group col-md-6">
					<label for="value">Instragram</label>
					<textarea class="form-control" id="value" name="value" rows="1">{{ old('value') }}</textarea>
				</div>
				<div class="form-group col-md-6">
					<label for="value">Instragram</label>
					<textarea class="form-control" id="value" name="value" rows="1">{{ old('value') }}</textarea>
				</div>
				<div class="form-group ml-3">
					<button class="btn btn-primary" type="submit">Actualizar</button>

					

				</form>
			</div>
		</div>
		@endsection