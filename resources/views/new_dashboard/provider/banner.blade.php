@extends('new_dashboard.layouts.app')

@section('title')
Banner para tu tienda
@endsection

@section('banner')
active
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5>Agregar un nuevo banner (Si ya tiene uno este sera eliminado)</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('provider.banner.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <input id="name" name="name" class="form-control" type="text" placeholder="Nombre del Banner">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="custom-file">
                                <input id="banner" name="banner"  class="custom-file-input" type="file">
                                <label for="banner" class="custom-file-label">Seleccione</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-end pt-3">
                            <button class="btn btn-primary" type="submit">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @if (!empty($banner))
        <!-- .card -->
        <div class="card card-figure">
            <!-- .card-figure -->
            <figure class="figure">
                <!-- .figure-img -->
                <div class="figure-img" style="background-image: url({{ Storage::url($banner->path) }})">
                    <div class="figure-tools">
                        <a href="#" class="tile tile-circle tile-sm mr-auto">
                            <span class="oi-data-transfer-download"></span></a>
                        <span class="badge badge-success">{{ $banner->name }}</span>
                    </div>
                    <div class="figure-action">
                        <a href="{{ route('provider.banner.destroy', $banner) }}"
                            class="btn btn-block btn-sm btn-primary"
                            onclick="event.preventDefault(); document.getElementById('delete').submit()">
                            Eliminar
                        </a>
                        <form action="{{ route('provider.banner.destroy', $banner) }}" id="delete" method="post">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
                <!-- /.figure-img -->
            </figure>
            <!-- /.card-figure -->
        </div>
        <!-- /.card -->
        @endif
    </div>
</div>
@endsection
