@extends('dashboard.layouts.app')

@section('title')
  Cambiar banner de categorias
@endsection

@section('content')

<div>
	<a href="{{ url()->previous() }}" class="btn btn-secondary mt-2 mb-2 text-white"><i class="fas fa-arrow-left"></i> Regresar</a>
</div>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modalsubir" data-whatever="@mdo"><i class="fas fa-plus"></i> Agregar</button>

<div class="modal fade" id="Modalsubir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" method="POST" action="{{ route('banner.category.add', $atras) }}">
        	@csrf
        	<div class="form-group">
            <label for="recipient-name" class="col-form-label">Categoria</label>
            <select id="categoria" name="categoria">
            	@foreach($categories as $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="banner" class="col-form-label">Agregar imagén</label>
            <input type="file" name="banner" id="banner">
          </div>
          <button type="submit" class="btn btn-primary">Subir</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-md-12 text-center mb-2">
      <h3 class="">Cambiar banners de categorias</h3>
  </div>
</div>
<div class="tab-content">
  <div class="tab-pane fade show active" >
	@foreach($banners as $banner)
  	<div class="card" style="width: 18rem; display: inline-block;">
	  <img class="card-img-top" src="{{ asset('storage/BannerCategory/'.$banner->path_banner) }}" alt="Card image cap" style="max-width: 120px; max-height: 120px;">
	  <div class="card-body">
	    <h5 class="card-title">{{ $banner->name }}</h5>
	    <p class="card-text"></p>
	    <form method='POST' action="{{ route('banner.category.update',[$atras, $banner, $position=7]) }}">
	    	@csrf
	     	@method('PUT')
	    	<button type="submit" class="btn btn-primary">Seleccionar</button>
	    </form>
	  </div>
	</div>
	@endforeach
  </div>
</div>	


@endsection