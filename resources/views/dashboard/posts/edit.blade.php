@extends('dashboard.layouts.app')

@section('title')
Editar Publicación
@endsection

@section('content')
<meta name="csrf-token" content="{{ Session::token() }}">
<script src="{{ asset('js/jquery.min.js') }}"></script>

<h2 class="text-center">Editar Publicación</h2>

<div class="card custom-form">
    <form id="crear" action="{{ route('products.update', $post) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="description">Descripcion del Post: </label>
                <textarea class="form-control" id="postDescription" name="postDescription">{{ $post->description }}</textarea>
            </div>
            <div class="form-group col-md-6">
                <label for="description">Descripcion del Producto:</label>
                <textarea id="description" class="form-control" name="description">{{ $post->product->description }}</textarea>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Nombre del producto: </label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Camiza Gabardina" value="{{ $post->product->name }}">
            </div>

            <div class="form-group col-md-5">
                <label for="categories">Categoria</label>
                <select id="categories" name="categories" class="form-control">
                    <option disabled class="font-weight-bold">---Seleccionar---</option>
                    @foreach($categories as $category)
                    <option {{ ($postCategory->id == $category->id) ? 'selected' : '' }} value="{{ $category->id }}">{{
                        $category->name }}</option>
                    @endforeach
                </select>
                <select name="sub_category_id" id="sub_category_id" class="form-control">
                    <option value="{{ $postSubCategory->id }}" class="font-weight-bold">{{ $postSubCategory->name }}</option>
                </select>
            </div>
        </div>
        @foreach ($post->product->detailsProduct as $detail)
        @if ($loop->last)
        <input type="hidden" id="numDetails" name="numDetails" value="{{ $loop->iteration }}">
        @endif
        <div class="cloneForm" id="detalles{{ $loop->iteration }}">
            <hr>
            <legend class="heading-reference"><span>Detalles #{{ $loop->iteration }}</span></legend>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="ID_{{ $loop->iteration }}_color" class="label_color">Color:</label>
                    <input type="text" name="ID_{{ $loop->iteration }}_color" id="ID_{{ $loop->iteration }}_color"
                        class="form-control input_color" placeholder="" value="{{ $detail->color }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="ID_{{ $loop->iteration }}_size" class="label_size">Tamaño:</label>
                    <input type="text" id="ID_{{ $loop->iteration }}_size" name="ID_{{ $loop->iteration }}_size" class="input_size form-control"
                        placeholder="" value="{{ $detail->size }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="ID_{{ $loop->iteration }}_price" class="label_price">Precio:</label>
                    <input type="text" id="ID_{{ $loop->iteration }}_price" name="ID_{{ $loop->iteration }}_price"
                        class="input_price form-control" placeholder="" value="{{ $detail->price }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="ID_{{ $loop->iteration }}_quantity" class="label_quantity">Cantidad:</label>
                    <input type="text" id="ID_{{ $loop->iteration }}_quantity" name="ID_{{ $loop->iteration }}_quantity"
                        class="form-control input_quantity" placeholder="" value="{{ $detail->quantity }}">
                </div>
            </div>
            <div class="custom-file">
                <input type="file" id="ID_{{ $loop->iteration }}_photo" name="ID_{{ $loop->iteration }}_photo[]" multiple="multiple" class="custom-file-input input_photo">
                <label for="ID_{{ $loop->iteration }}_photo" class="label_photo custom-file-label">Fotos</label>
            </div>
        </div>
        @endforeach
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
            <button type="submit" class="btn btn-success">Actualizar</button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/bs-custom-file-input.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/Scripts/CrearProductos.js') }}"></script>

<script>
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
