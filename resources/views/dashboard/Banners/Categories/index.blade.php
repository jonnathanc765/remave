@extends('dashboard.layouts.app')

@section('title')
  Banners
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
  <h3 class="">Banners de categorias</h3>
  </div>
</div>

@if(count($banners)<3)
  <div>
    <a href="{{ route('banner.category.create') }} " class="btn btn-primary mt-2 mb-2 text-white"><i class="fas fa-plus"></i> Agregar</a>
  </div>
@endif

<div class="tab-content">
  <div class="tab-pane fade show active" >
	@foreach($banners as $banner)
    <div class="card" style="width: 18rem; display: inline-block;">
  	  <img class="card-img-top" src="{{ asset('storage/BannerCategory/'.$banner->path_banner) }}" alt="Card image cap" style="max-width: 120px; max-height: 120px;">
  	  <div class="card-body">
  	    <h5 class="card-title">{{ $banner->name }}</h5>
  	    <p class="card-text"></p>
  	    <a href="{{ route('banner.category.addBanner', $banner) }}" class="btn btn-primary">Cambiar</a>
  	  </div>
  	</div>
	@endforeach
  </div>
</div>
@endsection