@extends('dashboard.layouts.app')

@section('banners')
Banner
@endsection

@section('title')
Mis banners
@endsection

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="text-center">Mis Banners</h2>
        </div>
    </div>
</div>
<div>
	<a href="{{ route('addBanner') }}" class="btn btn-primary mt-2 mb-2 text-white"><i class="fas fa-plus"></i> Agregar</a>
</div>
<div class="tab-content mb-2">
  <div class="tab-pane fade show active" >
	@foreach($banners as $banner)
  	<div class="card" style="width: 18rem; display: inline-block;">
	  <img class="card-img-top" src="{{ Storage::url($banner->name) }}" alt="Card image cap" style="max-width: 220px; max-height: 200px;">
	  <div class="card-body">
	    <h5 class="card-title">Banner Nro. {{ $loop->iteration }}</h5>
	    <p class="card-text">{{$banner->position != 0? 'Su banner esta publicado':'' }}</p>
	    <form action="{{ route('destroyBanner', $banner->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger btn-xs" {{$banner->position != 0? 'disabled':'' }}><i class="fas fa-trash-alt"></i>Eliminar</button>
        </form>
	  </div>
	</div>
	@endforeach
  </div>
</div>
@endsection