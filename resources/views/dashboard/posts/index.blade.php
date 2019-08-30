@extends('dashboard.layouts.app')

@section('title')
Tus Publicaciones
@endsection

@section('content')
<h2>Tus Publicaciones</h2>
<div>

    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i>
        Crear nueva publicacion
    </a>

</div>
@foreach($posts as $post)
<div class="card" style="width: 18rem; display: inline-block;">
    <div id="carouselExampleControls{{ $post->id }}" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($post->product->images as $image)
            <div class="carousel-item {{ ($loop->first) ? 'active' : '' }}">
                <img class="d-block w-100" src="{{ Storage::url($image->photo) }}">
            </div>
            @endforeach

        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls{{ $post->id }}" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls{{ $post->id }}" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="card-body">
        <h5 class="card-title">{{ $post->product->name }}</h5>
        <p class="card-text">{{ substr($post->product->description, 0,25) }}...</p>
        <a href="#" class="btn btn-info btn-xs"><i class="far fa-eye"></i></a>
        <a href="{{ route('products.edit', $post->id) }}" class="btn btn-success"><i class="fas fa-pen"></i></a>
        <form action="{{ route('products.destroy', $post->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i></button>
        </form>
    </div>
</div>
@endforeach
<div class="d-flex justify-content-center mt-5 mb-5">
    {{-- {{ $posts->links() }} --}}
</div>
@endsection
