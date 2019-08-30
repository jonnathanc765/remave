@extends('new_dashboard.layouts.app')

@section('title', 'Crear nueva Subcategoria')


@section('content')

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <form method="POST" action="{{ route('subcategories.store') }}">
                @csrf
                @method('POST')
                <div class="card-header">
                    <div class="row">
                        <div class="col-12">
                            <h5>Creando nueva subcategoria</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="col-form-label">Nombre de la subcategoria</label>
                        <input id="name" name="name" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Descripcion de la Subcategoria</label>
                        <textarea class="form-control" id="description" name="description"
                            rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Seleccione Categoria Padre</label>
                        <select id="category_id" name="category_id" class="form-control">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="pt-2">
                        <div class="border-top w-100 d-flex justify-content-end pt-3">
                            <button class="btn btn-primary" type="submit">Crear Subcategoria</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
