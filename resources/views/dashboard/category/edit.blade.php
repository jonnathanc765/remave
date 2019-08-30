@extends('dashboard.layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="">Modificar Categoria</h2>
        </div>
    </div>
	 <form action="{{route('category.update', $category)}}" method="POST" accept-charset="utf-8">
	            @csrf
	            {{ method_field('PUT') }}
	       		 <div class="form-group">
	                    <label for="">Categoria</label>
	                    <input type="text" name="name" class="form-control" value="{{$category->name}}">
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
	                    <label for="">descripcion</label>
	                    <textarea type="text" name="description" class="form-control">{{$category->description}}</textarea> 
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
	               <div class="form-group">
				        <a type="button" href="{{url()->previous()}}" class="btn btn-volver btn-secondary">Volver</a>
				        <button type="submit" class="btn-primary btn">Guardar</button>
				   </div>
		</form>
</div>
@endsection