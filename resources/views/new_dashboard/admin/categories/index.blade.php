@extends('new_dashboard.layouts.app')

@section('title', 'Categorias Registradas')

@section('categories', 'active')
    
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h5>@yield('title')</h5>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <a href="{{ route('admin.categories.create') }}">
                        <button class="btn btn-primary" type="button">Crear Nueva Categoria</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                 <table id="datatable" class="table datatable">
                    <thead class="bg-light">
                        <tr class="border-0">
                            <th class="border-0">#</th>
                            <th class="border-0">Imagen</th>
                            <th class="border-0">Nombre de la Categoria</th>
                            <th class="border-0">Subcategorias Registradas</th>
                            <th class="border-0">Categoria destacada</th>
                            <th class="border-0">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <div class="m-r-10">
                                    @if ($category->image)
                                    <img src="{{ Storage::url($category->image) }}" class="rounded category-img">
                                    @endif
                                </div>
                            </td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->subCategories->count() }}</td>
                            <td>
                                @if ($category->published)
                                <span class="badge-dot badge-success mr-1"></span>
                                Publicado
                                @else
                                <span class="badge-dot badge-brand mr-1"></span>
                                Sin Publicar
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.categories.edit', $category) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('admin.categories.show', $category) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.categories.destroy', $category) }}"
                                    onclick="event.preventDefault() ;document.getElementById('categories-destroy{{ $category->id }}').submit();">
                                    <i class="fa fa-trash"></i>
                                </a>

                                <form id="categories-destroy{{ $category->id }}"
                                    action="{{ route('admin.categories.destroy', $category) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@include('parts.datatables')
