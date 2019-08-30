@extends('new_dashboard.layouts.app')

@section('title')
Creando Nueva Pregunta Frecuente
@endsection

@section('faqs.create')
    active
@endsection

@section('content')

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="section-block" id="basicform">
            <h3 class="section-title">@yield('title')</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('faqs.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="question" class="col-form-label">Pregunta</label>
                        <input id="question" name="question" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="answer">Respuesta</label>
                        <textarea class="form-control" name="answer" id="answer" rows="3"></textarea>
                    </div>
                    <div class="d-flex justify-content-end pt-3">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection