@extends('new_dashboard.layouts.app')

@section('title', 'Crear nueva Categoria')


@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h5>@yield('title')</h5>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <label class="mr-2 mt-1">Publicar Inmediatamente</label>
                            <div class="switch-button switch-button-yesno">
                                <input type="checkbox" name="published" id="published">
                                <span>
                                    <label for="published"></label>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="col-form-label">Nombre de la categoria</label>
                        <input id="name" name="name" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Descripcion de la Categoria</label>
                        <textarea class="form-control" id="description" name="description"
                            rows="3"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex align-items-center">
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image" name="image">Cambiar Imagen de la
                                    Categoria</label>
                                    <br />
                                    <div id="prevista"> </div>  
                            </div>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="border-top w-100 d-flex justify-content-end pt-3">
                            <button class="btn btn-primary" type="submit">Guardar Categoria</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@section('scripts')
<script>
      $('#image').change(function(e) {
                addImage(e); 
                });
                console.log( $('#image').val());
                function addImage(e){
                var file = e.target.files[0],
                imageType = /image.*/;
            
                if (!file.type.match(imageType))
                return;
            
                var reader = new FileReader();
                reader.onload = fileOnload;
                reader.readAsDataURL(file);
                }
            
                function fileOnload(e) {
                var result=e.target.result;
                document.getElementById("prevista").innerHTML = '<img id="imgSalida" width="50px" height="50px" name="imagen"src="" />';
                $('#imgSalida').attr("src",result);
                }
</script>
@endsection 
@endsection
