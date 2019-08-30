@extends('new_dashboard.layouts.app')

@section('title', 'Subcategorias Registradas')

@section('subcategories', 'active')
    
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h5>@yield('title')</h5>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <a href="{{ route('subcategories.create') }}">
                        <button class="btn btn-primary" type="button">Crear Nueva Subcategoria</button>
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
                            <th class="border-0">Nombre de la Subcategoria</th>
                            <th class="border-0">Descripción</th>
                            <th class="border-0">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subCategories as $subCategory)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $subCategory->name }}</td>
                            <td>{{ $subCategory->description }}</td>
                            <td>
                                <a href="{{ route('subcategories.edit', $subCategory) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('subcategories.destroy', $subCategory) }}"
                                    onclick="event.preventDefault() ;document.getElementById('subcategories-destroy{{ $subCategory->id }}').submit();">
                                    <i class="fa fa-trash"></i>
                                </a>

                                <form id="subcategories-destroy{{ $subCategory->id }}"
                                    action="{{ route('subcategories.destroy', $subCategory) }}" method="post">
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
