@extends('dashboard.layouts.app')

@section('faqs')
    active
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="">Agregar Preguntas</h2>
        </div>
    </div>
    <div>
        <a href="{{ route('faq') }}" class="btn btn-secondary mt-2 mb-2 text-white"><i class="fas fa-arrow-left"></i> Regresar</a>
    </div>

    <form action="{{ route('faq.store') }}" method="POST">
    	{{ csrf_field() }}
    	<div class="form-group col-md-6">
	   		<label for="question">Pregunta</label>
	  		<input type="text" class="form-control" id="question" value="{{ old('question') }}" name="question" placeholder="Pregunta">
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

	  	<div class="form-group col-md-6">
	    	<label for="answer">Respuesta</label>
	    	<textarea class="form-control" id="answer" name="answer" rows="3">{{ old('answer') }}</textarea>
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

	  	<div class="form-group ml-3">
	  		<button class="btn btn-primary" type="submit">Crear</button>
	  	</div>
	</form>

</div>
@endsection