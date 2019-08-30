@extends('dashboard.layouts.app')

@section('banners')
active
@endsection

@section('banners')
active
@endsection

@section('content')

<ul class="nav nav-pills mb-3">
  <li class="nav-item">
    <a class="nav-link {{ $position== 1? 'active':'' }}" href="{{ route('banner',1) }}" aria-selected="true">Banners 1</a>
  </li>

  <li class="nav-item">
    <a class="nav-link {{ $position== 2? 'active':'' }}" href="{{ route('banner',2) }}" aria-selected="false">Banners 2</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ $position== 3? 'active':'' }}" href="{{ route('banner',3) }}"  aria-selected="false">Banners 3</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ $position== 4? 'active':'' }}" href="{{ route('banner',4) }}"  aria-selected="false">Banners 4</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ $position== 5? 'active':'' }}" href="{{ route('banner',5) }}"  aria-selected="false">Banners 5</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ $position== 6? 'active':'' }}" href="{{ route('banner',6) }}"  aria-selected="false">Banners 6</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ $position== 7? 'active':'' }}" href="{{ route('banner.category',7) }}"  aria-selected="false">Banners categorias</a>
  </li>
</ul>

<div class="row">
  <div class="col-md-12">
  <h3 class="">Banners {{ $position }}</h3>
  </div>
</div>

  <div>
@if(count($banners)!=5 && $position == 1)
      <a href="{{ route('banner.select', $position) }}" class="btn btn-primary mt-2 mb-2 text-white"><i class="fas fa-plus"></i> Agregar</a>
@elseif(count($banners)!=3 && $position == 2)
      <a href="{{ route('banner.select', $position) }}" class="btn btn-primary mt-2 mb-2 text-white"><i class="fas fa-plus"></i> Agregar</a>
@elseif(count($banners)!=2 && $position == 3)
      <a href="{{ route('banner.select', $position) }}" class="btn btn-primary mt-2 mb-2 text-white"><i class="fas fa-plus"></i> Agregar</a>
@elseif(count($banners)!=4 && $position == 4)
      <a href="{{ route('banner.select', $position) }}" class="btn btn-primary mt-2 mb-2 text-white"><i class="fas fa-plus"></i> Agregar</a>
@elseif(count($banners)!=2 && $position == 5)
      <a href="{{ route('banner.select', $position) }}" class="btn btn-primary mt-2 mb-2 text-white"><i class="fas fa-plus"></i> Agregar</a>
@elseif(count($banners)!=1 && $position == 6)
      <a href="{{ route('banner.select', $position) }}" class="btn btn-primary mt-2 mb-2 text-white"><i class="fas fa-plus"></i> Agregar</a>
@endif
  </div>

<div class="tab-content">
  <div class="tab-pane fade show active" >
	@foreach($banners as $banner)
  	<div class="card" style="width: 18rem; display: inline-block;">
	  <img class="card-img-top" src="{{ Storage::url($banner->name) }}" alt="Card image cap" style="max-width: 120px; max-height: 120px;">
	  <div class="card-body">
	    <h5 class="card-title">Banner Nro. {{ $loop->iteration }}</h5>
	    <p class="card-text"></p>
	    <a href="{{ route('banner.edit', [$banner, $position]) }}" class="btn btn-primary">Cambiar</a>
	  </div>
	</div>
	@endforeach
  </div>
</div>

@endsection