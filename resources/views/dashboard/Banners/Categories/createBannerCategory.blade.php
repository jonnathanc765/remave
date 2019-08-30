@extends('dashboard.layouts.app')

@section('title')
  Agregar banner de categoria
@endsection

@section('content')

<div class="row">
  <div class="col-md-12">
  	<h3 class="">Subir banner de las categorias</h3>
  </div>
</div>

<div>
	<a href="{{ url()->previous() }}" class="btn btn-secondary mt-2 mb-2 text-white"><i class="fas fa-arrow-left"></i> Regresar</a>
</div>

<form method="POST" enctype="multipart/form-data" action="{{ route('banner.category.store') }}">
	@csrf
	<div>
		<label for="categoria">Seleccionar categoria: </label>
		<select name="categoria" id="categoria">
			@foreach($categories as $category)
				<option value="{{ $category->id }}">{{ $category->name }}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="banner">Agregar Imagen: </label>
		<input type="file" name="banner" id="banner">
	</div>
	<button class="btn btn-primary" type="submit">Subir</button>
</form>


<h5 class="mt-4">Banners de categorias existentes</h5>

<div class="tab-content">
  <div class="tab-pane fade show active" >
	@foreach($banners as $banner)
    <div class="card" style="width: 18rem; display: inline-block;">
  	  <img class="card-img-top" src="{{ asset('storage/BannerCategory/'.$banner->path_banner) }}" alt="Card image cap" style="max-width: 120px; max-height: 120px;">
  	  <div class="card-body">
  	    <h5 class="card-title">{{ $banner->name }}</h5>
  	    <p class="card-text"></p>
  	    <form action="{{ route('banner.category.addBanner', $banner) }}" method="POST">
  	    	@csrf
  	    	{{ method_field('PUT') }}
	  	    <button type="submit" class="btn btn-primary">Agregar</button>
  	    </form>
  	  </div>
  	</div>
	@endforeach
  </div>
</div>

@endsection