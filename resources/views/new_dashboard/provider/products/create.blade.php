@extends('new_dashboard.layouts.app')

@section('products')
active
@endsection

@section('products', 'active')

@section('title')
Crear Producto
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <h5 class="card-header">@yield('title')</h5>
            <div class="card-body" id="app">
                <form id="create-form" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    
                    

                    {{ csrf_field() }}

                                 

                    

                    <div class="col-md-12">
                        <h2>Registra un nuevo producto</h2>
                        <div class="form-group">
                            <label for="name">Nombre del producto</label>
                            <input type="text" class="form-control" id="name" name="productName" value="{{ old('productName') }}">
                        </div>
                        <div class="form-group">
                            <label for="description_post">Descripcion del Post</label>
                            <textarea class="form-control" id="description_post" name="postDescription">{{ old('postDescription') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description_product">Descripcion del Producto</label>
                            <textarea class="form-control" id="description_product" name="productDescription">{{ old('productDescription') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Stock del producto</label>
                            <textarea class="form-control" id="quantity" name="product_quantity">{{ old('product_quantity') }}</textarea>
                        </div>
                        <div class="form-group">
                            <div class="switch-button switch-button-xs">
                                <input type="checkbox" checked name="published" id="published">
                                <span>
                                    <label for="published"></label>
                                </span>
                            </div>
                            <label for="published">Publicar Inmediatamente</label>
                        </div>
                        <div class="form-group col-6">
                            <h3 class="text-center">Seleccione una categoría</h3>
                            <select name="category_id" id="category_id" class="form-control" onchange="subCategories($('#category_id').val())">
                                <option value="" selected>Seleccione una categoría</option>
                                @forelse ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @empty
                                
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <select name="sub_category_id" id="sub_category_id" class="form-control">
                                <option value="" selected>Seleccione una subcategoría</option>
                            </select>
                        </div>
                    </div>

                    
                        
                    
                    <div class="mb-5">
                        <product size_type="Talla"></product>
                    </div>
                   

                    <button type="button" class="btn btn-success mt-2" onclick="document.getElementById('create-form').submit()"><i class="fa fa-check mr-1"></i> Guardar Cambios</button>
                    
                </form>
                
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

    <script src="{{ asset('js/vue/edit/bundle.js') }}"></script>
    <script src="{{ asset('js/axios.min.js') }}"></script>

    <script>
    function subCategories(id) {
        var data = new FormData();

        data.append('id', id);

        axios.post('{{ route("ajax.subcategory") }}', data)
            .then(response => {
                $('#sub_category_id').empty();
                var subcategories = response.data;
                for (var i = 0; i < subcategories.length; i++) {
                    $('#sub_category_id').append('<option value="' + subcategories[i].id + '">' + subcategories[i].name + '</option>');
                }

            })
        ;
    }
    </script>
 
   
@endsection
