@extends('new_dashboard.layouts.app')

@section('products')
active
@endsection

@section('products', 'active')

@section('title')
Lista de todos tus productos.
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="row">
            
            @forelse ($posts as $post)
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="product-thumbnail">
                    <div class="product-img-head d-flex justify-content-center align-items-center">
                        <div class="product-img">
                            <img src="{{ Storage::url($post->products->first()->images->first()->path) }}" alt="" class="img-fluid product-img">
                        </div>
                    </div>
                    <div class="product-content">
                        <div class="product-content-head">  
                            <h3 class="product-title text-truncate">{{ $post->products->first()->name }}</h3>
                            <p class="product-price position-relative text-right">${{ $post->products->first()->price }}</p>
                        </div>
                        <div class="product-btn row">
                            <div class="col-6 p-0 d-flex justify-content-around">
                                <a href="{{ route('provider.post.show', $post->id) }}"
                                    class="btn btn-primary">Detalles</a>
                            </div>
                            <div class="col-6 p-0 d-flex justify-content-around">
                                <a href="{{ route('provider.product.edit', $post->id) }}" class="btn btn-primary">Editar</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <h5>No tiene productos registrados</h5>
            @endforelse
            {{ $posts->links() }}
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('DataTables/datatables.js') }}"></script>
@endsection
