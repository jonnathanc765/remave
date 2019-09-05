@extends('new_dashboard.layouts.app')

@section('products')
active
@endsection

@section('products', 'active')

@section('title')
Editando producto
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <h5 class="card-header">@yield('title')</h5>
            <div class="card-body" id="app">
                <form id="update-form" action="{{ route('product.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    
                    {{ csrf_field() }}

                    {{ method_field('PUT') }}
                    

                    <input type="hidden" name="quantity" value="{{ $quantity }}">

                    <div class="col-md-12">
                        <h2>Registra un nuevo producto</h2>
                        <div class="form-group">
                            <label for="name">Nombre del producto</label>
                            <input type="text" class="form-control" id="name" name="productName" value="{{ $post->products->first()->name }}">
                        </div>
                        <div class="form-group">
                            <label for="description_post">Descripcion del Post</label>
                            <textarea class="form-control" id="description_post" name="postDescription">{{ $post->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description_product">Descripcion del Producto</label>
                            <textarea class="form-control" id="description_product" name="productDescription">{{ $post->products->first()->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Stock del producto</label>
                            <textarea class="form-control" id="quantity" name="product_quantity">{{ $post->products->first()->quantity }}</textarea>
                        </div>
                        <div class="form-group">
                            <div class="switch-button switch-button-xs">
                                <input type="checkbox" {{ $post->published? 'checked':'' }} name="published" id="published"><span>
                                <label for="published"></label></span>
                            </div>
                            <label for="published">Publicar Inmediatamente</label>
                        </div>
                        <div class="form-group col-6">
                            <h3 class="text-center">Seleccione una categoría</h3>
                            <select name="category_id" id="category_id" v-model="category_id" class="form-control" onchange="subCategories($('#category_id').val())">
                                <option value="0" selected>Seleccione una categoría</option>
                                @forelse ($categories as $category)
                                <option value="{{ $category->id }}" {{ $post->products->first()->subcategory->category->id == $category->id? 'selected' : '' }}>{{ $category->name }}</option>
                                @empty
                                
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <select name="sub_category_id" id="sub_category_id" class="form-control">
                                <option value="0" selected>Seleccione una subcategoría</option>
                                
                                @forelse ($post->products->first()->subcategory->category->subCategories as $subCategory)
                                <option value="{{ $subCategory->id }}" {{ $post->products->first()->subcategory->id == $subCategory->id? 'selected' : '' }}>{{ $subCategory->name }}</option>
                                @empty
                                
                                @endforelse
                                
                            </select>
                        </div>
                    </div>

                    @forelse ($post->products as $product)
                        
                    
                    <div class="product-item product_{{ $product->id }}">
                        <hr>
                        <legend class="heading-reference"><span>Producto N° {{ $loop->index + 1 }}</span></legend>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="hidden" name="ID_code_{{ $loop->index }}" value="{{ $product->code }}">
                                <label for="ID_color_{{ $loop->index }}" class="col-form-label label_color">Marca:</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="ID_color_{{ $loop->index }}" id="ID_color_{{ $loop->index }}"
                                        class="form-control input_color" placeholder="" value="{{ $product->color }}">
                                </div>
                            </div>
                           {{-- <div class="form-group col-md-6">
                                <label class="label_size col-form-label" for="ID_size_{{ $loop->index }}">Tamaño</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="ID_size_{{ $loop->index }}" class="form-control input_size" id="ID_size_{{ $loop->index }}" value="{{ $product->size }}">
                                    <div class="input-group-append be-addon">
                                        <select name="ID_size_type_{{ $loop->index }}" class="form-control select_size_type" id="ID_size_type_{{ $loop->index }}">
                                            <option value="type" disabled>Tipo</option>
                                            <option value="GB">GB</option>
                                            <option value="Talla">Talla</option>
                                            <option value="Capacidad">Capacidad</option>
                                        </select>
                                    </div>
                                </div>
                            </div>--}}
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="ID_price_" class="label_price">Precio:</label>
                                <input type="text" id="ID_price_{{ $loop->index }}" name="ID_price_{{ $loop->index }}" class="input_price form-control"
                                    placeholder="" value="{{ $product->price }}">
                            </div>
                                                      
                            <div class="form-group col-md-6">
                                <label for="ID_off_{{ $loop->index }}" class="label_off">Descuento:</label>
                                <div class="input-group ">
                                    <input type="text" id="ID_off_{{ $loop->index }}" name="ID_off_{{ $loop->index }}"
                                    class="form-control input_off" placeholder="70% (opcional)"
                                    value="{{ $product->off }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text porcentage">%</span>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            @forelse ($product->images as $image)
                                <a class="img-uploaded image_{{ $image->id }}">
                                                           
                                        
                                    <img src="{{ Storage::url($image->path) }}" alt="" width="50px" height="50px">
                                    <button type="button" onclick="imageDelete({{ $image->id }})"><i class="fa fa-times"></i></button>
                                    
                                </a>
                            @empty
                                <h2>Producto sin imágenes</h2>
                            @endforelse
                        </div>
                        <h2>Cargar nuevas fotos</h2>
                        <div class="custom-file">
                            <input type="file" id="ID_photo_{{ $loop->index }}" name="ID_photo_{{ $loop->index }}[]"  onclick="addImage({{ $loop->index }});" class="custom-file-input input_photo"
                                multiple="multiple">
                            <label for="'ID_photo_{{ $loop->index }}" class="label_photo custom-file-label">Click aqui para subir imagenes</label>
                            
                                <div id="thumb-output_{{ $loop->index }}"></div>
                            <br/>    
                        </div>




                        <div class="col-md-12 d-flex justify-content-end mt-4">
                                                            
                            <button class="btn btn-danger" type="button" onclick="productDelete({{ $product->id }})"><i class="fa fa-trash-alt"></i></button>
                            
                        </div>
                    </div>
                    @empty
                        <h2>Este Post no tiene productos registrados</h2>
                    @endforelse

                    <button type="button" class="btn btn-success ml-3 mt-3" onclick="document.getElementById('update-form').submit()"><i class="fa fa-check mr-1"></i> Guardar Cambios</button>
                    
                </form>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('product.new', $post) }}" class="btn btn-primary mr-3 mb-3"><i class="fa fa-plus mr-1"></i>Agregar un nuevo producto</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/request.js') }}"></script>

    <script>


    function imageDelete(image) {      
        var data = new FormData();
        
        data.append('_method', 'DELETE');
        data.append('id', image);

        axios.post('/provider/images/delete', data)
        .then(response => { 
            $('.image_' + image).fadeOut(200, function() {
                $(this).remove();
            });
            swal("¡Todo salió bien!", "Imagen eliminada de forma exitosa", "success");     
        })
        .catch(function (error) {
            swal("¡Algo ha salido mal!", "No se ha podido eliminar la imagen seleccionada", "success");     
        });
    }

    function productDelete(product) {
        var data = new FormData();
        
        data.append('_method', 'DELETE');
        data.append('id', product);

        axios.post('/provider/products/delete', data)
        .then(response => { 
            $('.product_' + product).fadeOut(200, function() {
                $(this).remove();
            });
            console.log(response);
            swal("¡Todo salió bien!", "Producto eliminado de forma exitosa", "success");     
        })
        .catch(function (error) {
            console.log(error);
            swal("¡Algo ha salido mal!", "No se ha podido eliminar el producto seleccionado", "error");     
        });
    }
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

    function addImage(num){
        $('#ID_photo_'+num).on('change', function(){ //on file input change
            if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
            {
                var data = $(this)[0].files; //this file data 
                $.each(data, function(index, file){ //loop though each file
                    if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function(file){ //trigger function on successful read
                        return function(e) {
                            var img = $('<img/>').addClass('img-uploading').attr('src', e.target.result); //create image element 
                            $('#thumb-output_'+num).append(img); //append image to output element
                        };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });
            }else{
                alert("Tu navegador no soporta subida de archivos"); //if File API is absent
            }
                e.preventDefault();
                data.splice(0, 1);
                $('#thumb-output a').eq(data.length).remove();
        });
    }
        
    
    </script>


@endsection
