@extends('new_dashboard.layouts.app')

@section('title')
Preguntas Frecuentes
@endsection

@section('faqs.index')
    active
@endsection

@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 d-flex justify-content-end pb-3">
    <a href="{{ route('faqs.create') }}"><button class="btn btn-primary" type="button">Añadir Nueva</button></a>
</div>
@forelse ($faqs as $faq)
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <div class="card-header d-flex">
            Pregunta # {{ $loop->iteration }}
            <div class="dropdown ml-auto">
                <a class="toolbar" href="#" role="button" id="dropdownMenuLink5"
                    onclick="event.preventDefault(); document.getElementById('delete_{{ $loop->iteration }}').submit()">
                    <i class="fas fa-trash-alt"></i>
                </a>
                <a class="toolbar" href="{{ route('faqs.edit', ['id' => $faq->id]) }}">
                    <i class="fas fa-pencil-alt"></i>
                </a>
                <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST" id="delete_{{ $loop->iteration }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                </form>
            </div>
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p>{{ $faq->question }}</p>
                <footer class="blockquote-footer">{{ $faq->answer }}
                    {{-- <cite title="Source Title">Source Title</cite> --}}
                </footer>
            </blockquote>
        </div>
    </div>
</div>
@empty
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p>No hay preguntas frecuentes creadas</p>
            </blockquote>
        </div>
    </div>
</div>
@endforelse

<div class="col-12">
    {{ $faqs->links() }}
</div>

@endsection
