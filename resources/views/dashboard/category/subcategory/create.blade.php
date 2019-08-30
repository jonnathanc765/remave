@extends('dashboard.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="">Crear nueva Sub-Categoria</h2>
        </div>
    </div>
	 <form action="{{route('Subcategory.store', $category)}}" method="POST" accept-charset="utf-8">

			@csrf

			<div class="form-group">
				<label for="">Categoria Perteneciente</label>
				<input type="text" value="{{ $category->name }}" class="form-control" disabled>
			</div> 


	        <div class="form-group">
				<label for="">Nombre Sub-Categoria</label>
				<input type="text" name="name" class="form-control">
			</div>  

			@if($errors->has('name'))
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->get('name') as $error)
					<li> {{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif 

			<div class="form-group">
				<label for="">Descripción</label>
				<textarea type="text" name="description" class="form-control"></textarea> 
			</div>

			@if($errors->has('description'))
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->get('description') as $error)
					<li> {{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
	     
	        <a type="button" href="{{url()->previous()}}" class="btn btn-secondary" data-dismiss="modal">Volver</a>
	        <button type="submit" class="btn-primary btn">Guardar</button>
	   </form>
</div>
@endsection