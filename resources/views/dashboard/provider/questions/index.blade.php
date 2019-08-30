@extends('dashboard.layouts.app')

@section('questions')
active
@endsection

@section('title')
Preguntas
@endsection

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="text-center">Preguntas de Usuarios</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="accordion" id="accordionExample">
                @foreach($commentpost as $comment)
                <div class="row m-2 bg-white rounded">
                    <div class="row m-3">
                        <div class="col-2 bg-black">
                            <img src="{{ asset('img/iphone.jpg') }}" alt="imagen" class="rounded img-fluid" style="">
                        </div>
                        <div class="col-10 align-self-center">
                         <h4>{{ $comment->product->name }}</h4>
                        </div>
                    </div>
                    <div class="row m-3">
                        <div class="col-1">
                            <span><i class="fas fa-comment-alt fa-2x"></i></span>
                        </div>
                        <div class="col-11">
                            <p>{{ $comment->comment }}<br><h6>{{ $comment->user->name }}</h6></p>
                            <form action="{{route('questions.update', $comment)}}" method="POST" accept-charset="utf-8">
                            <div class="form-group">
                                @csrf
                                {{ method_field('PUT') }}
                                <textarea name="answer" class="form-control" rows="2" placeholder="Responder el comentario"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Responder</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-md-12 d-flex justify-content-center mt-4">
                    {{ $commentpost->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
