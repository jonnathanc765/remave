@extends('new_dashboard.layouts.app')

@section('title', 'Visualizando Categoria')

@section('content')
<div class="row">
    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-b-30">
                <div class="product-slider d-flex justify-content-center align-items-center">
                        <img class="img-fluid" src="{{ Storage::url($category->image) }}" alt="First slide">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                <div class="product-details">
                    <div class="border-bottom pb-3 mb-3">
                        <h2 class="mb-3">{{ $category->name }}</h2>
                    </div>
                    <div class="product-colors border-bottom">
                        <h4>Sub categorias registradas en {{ $category->name }}</h4>
                        <h5>{{ $category->subcategories->count() }}</h5>
                    </div>
                    <div class="product-size border-bottom">
                        <h4>Estado</h4>
                        <div class="product-qty">
                            @if ($category->published)
                            <span class="badge-dot badge-success mr-1"></span>
                            Publicado
                            @else
                            <span class="badge-dot badge-brand mr-1"></span>
                            Sin Publicar
                            @endif
                        </div>
                    </div>
                    <div class="product-description">
                        <h4 class="mb-1">Descripcion</h4>
                        <p>{{ $category->description }}</p>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="ml-auto mr-auto col-6">
                    <a href="{{ route('admin.categories.edit', ['id' => $category->id]) }}" class="btn btn-primary btn-block btn-lg">Editar</a>
                    <a href="{{ route('admin.categories.destroy', ['id' => $category->id]) }}" class="btn btn-danger btn-block btn-lg" onclick="event.preventDefault() ;document.getElementById('categories-destroy').submit();">Eliminar</a>
                    <form id="categories-destroy" action="{{ route('admin.categories.destroy', ['id' => $category->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
