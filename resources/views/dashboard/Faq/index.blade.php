@extends('dashboard.layouts.app')

@section('faqs')
active
@endsection

@section('title')
Preguntas Frecuentes
@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('css/estilostabla.css') }}">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="">Preguntas Frecuentes</h2>
        </div>
    </div>
    <div>
        <a href="{{ route('faq.create') }}" class="btn btn-primary mt-2 mb-2 text-white"><i class="fas fa-plus"></i> Agregar</a>
    </div>
    
    <div class="row tabla mb-5">
        <div class="col table-responsive">
            <table class="table table-bordered">
                <thead>
                    <th>#</th>
                    <th>Pregunta</th>
                    <th>Respuesta</th>
                    <th>Aciones</th>
                </thead>
                <tbody>
                @foreach($faqs as $faq) 
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="pregunta-tabla">{{ $faq->question }}</td>
                    <td class="respuesta-tabla">{{ $faq->answer }}</td>
                    <form action="{{ route('faq.destroy', $faq->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    <td class="opciones-tabla text-center">
                        <a class="btn btn-success btn-xs text-white" href="{{ route('faq.edit', $faq) }}" alt="Modificar"><i class="fas fa-edit"></i></a>
                        <button type="submit" class="btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i></button>
                    </td>
                    </form>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
       
@endsection