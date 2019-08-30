@extends('dashboard.layouts.app')

@section('title')
  Agregar banner
@endsection

@section('content')

<div>
	<a href="{{ url()->previous() }}" class="btn btn-secondary mt-2 mb-2 text-white"><i class="fas fa-arrow-left"></i> Regresar</a>
</div>

<div class="row">
  <div class="col-md-12 text-center mb-2">
      <h3 class="">Agregar banners {{ $position }}</h3>
  </div>
</div>

<div class="tab-content">
  <div class="tab-pane fade show active" >
	@foreach($banners as $banner)
  	<div class="card" style="width: 18rem; display: inline-block;">
	  <img class="card-img-top" src="{{ Storage::url($banner->name) }}" alt="Card image cap" style="max-width: 120px; max-height: 120px;">
	  <div class="card-body">
	    <h5 class="card-title">Banner Nro. {{ $loop->iteration }}</h5>
	    <p class="card-text"></p>
	    <form method='POST' action="{{ route('banner.published', [$banner, $position]) }}">
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