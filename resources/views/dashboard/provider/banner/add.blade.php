@extends('dashboard.layouts.app')

@section('banners')
Banner
@endsection

@section('title')
Agregar banner
@endsection

@section('content')
<div>
	<a href="{{ route('listBanner') }}" class="btn btn-primary mt-2 mb-2 text-white"><i class=""></i>Atras</a>
</div>

<div class="container col-12">
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="text-center">Agregar banners</h2>
        </div>
    </div>
	<div class="alert-info mb-3" role="alert">
	  <ul>
	  	<h4 class="text-center"><b>Recomendación</b></h4>
	  	<li>1</li>
	  	<li>2</li>
	  	<li>3</li>
	  	<li>4</li>
	  	<li>5</li>
	  	<li>6</li>
	  </ul>
	</div>
	<form method="POST" action="{{ route('storeBanner') }}" enctype="multipart/form-data">
		<div class="form-group ">
			@csrf
			<div class="custom-file">
	            <input required type="file" id="ID_1_banner" name="ID_1_banner[]" class="custom-file-input input_photo" multiple="multiple">
	            <label for="ID_1_photo" class="label_photo custom-file-label">Fotos</label>
	        </div>
			<div class="form-group mt-3">
				<button type="submit">Subir</button>
			</div>
		</div>
	</form>
</div>

@endsection