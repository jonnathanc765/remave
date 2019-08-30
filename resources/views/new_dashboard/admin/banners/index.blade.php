@extends('new_dashboard.layouts.app')

@section('title')
Banners de la pagina principal
@endsection

@section('banners')
active
@endsection

@section('content')

<div class="row">
    <div class="col-8">
        <h3 class="text-success"><strong>Banners Publicados</strong></h3>
    </div>
    <div class="col-4">
        <p class="text-right text-success">Limite en esta posicion: {{ $limit }}</p>
    </div>
</div>

<div class="row">
    @forelse ($bannersPublished as $banner)
    <div class="col-6">
        <!-- .card -->
        <div class="card card-figure">
            <!-- .card-figure -->
            <figure class="figure">
                <!-- .figure-img -->
                <div class="figure-img" style="background-image: url({{ Storage::url($banner->path) }})">
                    <div class="figure-tools">
                        <a href="#" class="tile tile-circle tile-sm mr-auto">
                            <span class="oi-data-transfer-download"></span>
                        </a>
                        <span class="badge badge-success">Publicado</span>
                    </div>
                    <div class="figure-action">
                        <a href="{{ route('banner.unset',$banner) }}" class="btn btn-block btn-sm btn-primary">Eliminar</a>       
                    </div>
                </div>
                <!-- /.figure-img -->
                <!-- .figure-caption -->
                <figcaption class="figure-caption">
                    <h6 class="figure-title"><a href="#">Tienda: {{ $banner->shop->name }}</a></h6>
                    <p class="text-muted mb-0">Proveedor: {{ $banner->shop->user->name }}</p>
                </figcaption>
                <!-- /.figure-caption -->
            </figure>
            <!-- /.card-figure -->
        </div>
        <!-- /.card -->
    </div>
    @empty
    <div class="col-12">
        <p>Ningun Banner Publicado</p>
    </div>
    @endforelse
</div>

<div class="row">
    <div class="col-12 pt-4">
        <h3 class="text-danger"><strong>Banners Disponibles</strong></h3>
    </div>
</div>

<div class="row">
    @forelse ($allBanners as $banner)
    <div class="col-6">
        <!-- .card -->
        <div class="card card-figure">
            <!-- .card-figure -->
            <figure class="figure">
                <!-- .figure-img -->
                <div class="figure-img" style="background-image: url({{ Storage::url($banner->path) }})">
                    <div class="figure-tools">
                        <a href="#" class="tile tile-circle tile-sm mr-auto">
                            <span class="oi-data-transfer-download"></span>
                        </a>
                        <span class="badge badge-danger">Disponible</span>
                    </div>
                    <div class="figure-action">
                        <a href="{{ route('banner.published', ['id' => $banner->id, 'position' => $position]) }}" class="btn btn-block btn-sm btn-primary" onclick="event.preventDefault(); document.getElementById('publicar__{{ $loop->iteration }}').submit()">Publicar</a>
                        <form id="publicar__{{ $loop->iteration }}"
                            action="{{ route('banner.published', ['id' => $banner->id, 'position' => $position]) }}"
                            method="POST">
                            @method('PUT')
                            @csrf
                        </form>
                    </div>
                </div>
                <!-- /.figure-img -->
                <!-- .figure-caption -->
                <figcaption class="figure-caption">
                    <h6 class="figure-title"><a href="#">Tienda: {{ $banner->shop->name }}</a></h6>
                    <p class="text-muted mb-0">Proveedor: {{ $banner->shop->user->name }}</p>
                </figcaption>
                <!-- /.figure-caption -->
            </figure>
            <!-- /.card-figure -->
        </div>
        <!-- /.card -->
    </div>
    @empty
    <div class="col-12">
        <h3>No hay banners publicados</h3>
    </div>
    @endforelse
</div>


@endsection
