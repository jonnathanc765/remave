@extends('dashboard.layouts.app')

@section('title')
    Faqs
@endsection

@section('content')

<link rel="stylesheet" href="{{ asset('css/editar.css') }}"/>
<div class="container bg-white">
    <div class="row mb-3 py-2 header-editar">
        <div class="col-md-12 text-center">
            <h2>Modificar pregunta</h2>
        </div>
    </div>

    <div>
    </div>
    <form action="{{ route('faq.update', $faq) }}" method="POST">
    	{{ csrf_field() }}
    	{{ method_field('PUT') }}
    	<div class="form-group col-md-12">
	   		<label for="question">Pregunta</label>
	  		<input type="text" class="form-control" id="question" name="question" value="{{ $faq->question }}">
	  	</div>
	  	
	  	@if($errors->has('question'))
	  		<div class="alert alert-danger">
				<ul>
					@foreach($errors->get('question') as $error)
					<li> {{ $error }}</li>
					@endforeach
				</ul>
			</div>
	  	@endif

	  	<div class="form-group col-md-12">
	    	<label for="answer">Respuesta</label>
	    	<textarea class="form-control" id="answer" name="answer" rows="3" >{{ $faq->answer }}</textarea>
	  	</div>

	  	@if($errors->has('answer'))
	  		<div class="alert alert-danger">
				<ul>
					@foreach($errors->get('answer') as $error)
					<li> {{ $error }}</li>
					@endforeach
				</ul>
			</div>
	  	@endif

	  	<div class="row">


			<div class="col-12 col-sm-6">
				<a href="{{ url()->previous() }}" class="btn btn-secondary mt-2 mb-2 text-white"><i class="fas fa-arrow-left"></i> Regresar</a>
			</div>

			<div class="col-12 col-sm-6 d-flex justify-content-end">
				<button class="d-blox btn btn-success mb-3" type="submit">Actualizar</button>
			</div>
		</div>
	</form>
</div>
@endsection