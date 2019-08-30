@extends('new_dashboard.layouts.app')

@section('title')
Banners de las tiendas
@endsection

@section('banners.shop', 'active')

@section('css')
<link rel="stylesheet" href="{{ asset('vendors/select2/css/select2.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <form action="{{ route('banner.shop.store') }}" method="post" enctype="multipart/form-data">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12">
                            <h5>Crear o actualizar banner de una tienda</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        @csrf
                        @method('POST')
                        <div class="col-4">
                            <div class="form-group custom-file mb-3">
                                <label for="banner">Seleccione Banner</label>
                                <input type="file" class="form-control" id="banner" name="banner">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="name">Nombre del banner</label>
                                <input id="name" name="name" class="form-control" type="text"
                                    placeholder="Banner de la tienda Shoppfy">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="shop">Seleccione la tienda</label>
                                <select id="shop" class="shop-select" name="shop">
                                    @foreach ($shops as $shop)
                                    <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-2">
                            <button class="btn btn-primary" type="submit">Guardar imagen</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script src="{{ asset('vendors/select2/js/select2.min.js') }}"></script>

<script>
    $(document).ready(function () {
        $('.shop-select').select2();
    });

</script>
@endsection
