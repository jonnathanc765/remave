@extends('new_dashboard.layouts.app')

@section('title')
    Preguntas y a tus post
@endsection

@section('questions')
    active
@endsection

@section('content')
    

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    @forelse ($comments as $comment)
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">
                <a href="{{ route('single-product', $comment->post->products->first()->code) }}">
                    {{ $comment->post->products->first()->name }}
                </a>
            </h3>
            <div>
                <a href="{{ route('single-product', $comment->post->products->first()->code) }}">
                    <img class="img-responsive mb-4" src="{{ Storage::url($comment->post->products->first()->images->first()->path) }}" alt="Card image cap" style="max-width: 100px;">
                </a>
            </div>
            <p class="card-text text-justify">{{ $comment->comment }}</p>
            <form action="{{ route('questions.update', $comment) }}" method="POST">
                @csrf
                {{ method_field('PUT') }}
                <div class="form-group">
                    <textarea type="text" class="form-control" style="max-height: 100px;" name="answer"></textarea>
                </div>
                <button type="submit" class="card-link btn btn-primary">Responder</button>
                
            </form>
        </div>
    </div>

    @empty 
    <h2 class="text-center">Actualmente no posees preguntas</h2>
    @endforelse
    
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            {{-- {{ $comments->links() }} --}}
        </div>
    </div>
</div>



@endsection