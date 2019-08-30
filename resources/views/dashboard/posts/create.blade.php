@extends('dashboard.layouts.app')

@section('title')
Agregar Publicación
@endsection

@section('content')
<meta name="csrf-token" content="{{ Session::token() }}">
<script src="{{ asset('js/jquery.min.js') }}"></script>

<h2 class="text-center">Agregar Publicación</h2>

<div class="card custom-form">
    <form id="crear" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="description">Descripcion del Post: </label>
                <textarea class="form-control" id="postDescription" name="postDescription"></textarea>
            </div>
            <div class="form-group col-md-6">
                <label for="description">Descripcion del Producto:</label>
                <textarea id="description" class="form-control" name="description"></textarea>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Nombre del producto: </label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Camiza Gabardina" value="{{ old('name') }}">
            </div>

            <div class="form-group col-md-5">
                <label for="categories">Categoria</label>
                <select id="categories" name="categories" class="form-control">
                    <option disabled selected="" value="{{ old('categories') }}" class="font-weight-bold">---Seleccionar---</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <select name="sub_category_id" disabled id="sub_category_id" class="form-control">
                    <option disabled selected="" value="{{ old('sub_category_id') }}" class="font-weight-bold">---Seleccionar---</option>
                </select>
            </div>
        </div>
        <input type="hidden" id="numDetails" name="numDetails" value="">
        <div class="cloneForm" id="detalles1">
            <hr>
            <legend class="heading-reference"><span>Detalles #1</span></legend>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="ID_1_color" class="label_color">Color:</label>
                    <input type="text" name="ID_1_color" id="ID_1_color" class="form-control input_color" placeholder=""
                        value="{{ old('ID_1_color') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="ID_1_size" class="label_size">Tamaño:</label>
                    <input type="text" id="ID_1_size" name="ID_1_size" class="input_size form-control" placeholder=""
                        value="{{ old('ID_1_size') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="ID_1_price" class="label_price">Precio:</label>
                    <input type="text" id="ID_1_price" name="ID_1_price" class="input_price form-control" placeholder=""
                        value="{{ old('ID_1_price') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="ID_1_quantity" class="label_quantity">Cantidad:</label>
                    <input type="text" id="ID_1_quantity" name="ID_1_quantity" class="form-control input_quantity"
                        placeholder="" value="{{ old('ID_1_quantity') }}">
                </div>
            </div>
            <div class="custom-file">
                <input type="file" id="ID_1_photo" name="ID_1_photo[]" class="custom-file-input input_photo" multiple="multiple">
                <label for="ID_1_photo" class="label_photo custom-file-label">Fotos</label>
            </div>
        </div>
        <div class="form-buttons-w pt-5 d-flex justify-content-center">
            {{-- Boton para gregar detalles de los productos --}}
            <div class="form-row">
                <div class="form-group col-md-6">
                    <button class="btn btn-info" id="btnAdd" type="button">Agregar Detalles del Producto</button>
                </div>
                <div class="form-group col-md-6">
                    <button class="btn btn-info" id="btnRemove" type="button">Eliminar Detalles del Producto</button>
                </div>
            </div>
        </div>
        {{-- Boton para enviar el formulario --}}
        <div class="form-buttons-w d-flex justify-content-center">
            <button type="submit" class="btn btn-success">Registrar</button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/Scripts/CrearProductos.js') }}"></script>

<script>
    //Activar y llenar el select de las subcategorias dependiendo de la categoria seleccionada
    $('#categories').change(function () {
        var id = $('#categories').val();
        $.post('{{ route('ajax.subcategory') }}', {
                id: id,
                '_token': $('meta[name=csrf-token]').attr('content')
            },
            function (data, textStatus, xhr) {
                var subcategories = (data);

                if (subcategories.length > 0) {
                    $('#sub_category_id').removeAttr('disabled');
                    $('#sub_category_id').empty();
                    for (var i = 0; i < subcategories.length; i++) {
                        $('#sub_category_id').append('<option value="' + subcategories[i]['id'] + '">' +
                            subcategories[i]['name'] + '</option>');
                    }
                } else {
                    $('#sub_category_id').attr('disabled', 'true');
                    $('#sub_category_id').empty();
                }
            });
    });
    //Fin de las subcategorias
</script>
@endsection
