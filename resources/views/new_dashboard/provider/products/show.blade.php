@extends('new_dashboard.layouts.app')

@section('products')
active
@endsection

@section('products', 'active')

@section('title')
{{-- {{ dd($post) }} --}}
    {{ $post->products->first()->name }}
@endsection

@section('content')


    <div class="row">
        <div class="col-12">

            <h2 class="text-center">Detalles del Producto</h2>


            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pr-xl-0 pr-lg-0 pr-md-0  m-b-30">
                    <div class="product-slider">
                        <div id="productslider-1" class="product-carousel carousel slide" data-ride="carousel">
                            <div class="text-center">
                                <img src="{{ Storage::url($post->products->first()->images->first()->path) }}" alt="" width="80%">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                    <div class="product-details">
                        <div class="border-bottom pb-3 mb-3">
                            <h2 class="mb-3">{{ $post->products->first()->name }}</h2>
                            <div class="product-rating d-inline-block float-right">
                                
                                @for ($i = 0; $i < $post->averageValuation(); $i++)    
                                    <i class="fa fa-fw fa-star"></i>
                                @endfor
                                
                            </div>
                            <h3 class="mb-0 text-primary">Detalles Registrados: {{ $post->totalProducts() }}</h3>
                        </div>
                        <div class="product-colors border-bottom">
                            <h4>Marcas</h4>

                            @forelse ($post->products as $product)
                            <input type="radio" class="radio" id="radio-1" name="group" />
                            <label for="radio-1">red</label>
                            @empty
                                
                            @endforelse
                            
                            
                        </div>
                        {{--<div class="product-size border-bottom">
                            <h4>Tamaños Disponibles</h4>
                            <div class="btn-group" role="group" aria-label="First group">
                                @forelse ($post->products as $product)
                                <button type="button" class="btn btn-outline-light">{{ $product->size }} {{ $product->size_type }}</button>
                                @empty
                                    
                                @endforelse
                            </div>
                            
                        </div>--}}
                        <div class="product-description">
                            <h4 class="mb-1">Descripción</h4>
                            <p>{{ $post->products->first()->description }}</p>
                            <a href="{{ route('provider.product.edit', $post->id) }}" class="btn btn-primary btn-block btn-lg">Editar</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 m-b-60">
                    <div class="simple-card">
                        <ul class="nav nav-tabs" id="myTab5" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active border-left-0" id="product-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="product-tab-1" aria-selected="true">Detalles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="product-tab-2" aria-selected="false">Reseñas</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent5">
                            <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="product-tab-1">
                                

                                <h2 class="text-center">Detalles del producto</h2>

                                <div class="row">
                                    @forelse ($post->products as $product)
                                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="card">
                                                <img class="img-fluid" src="{{ Storage::url($product->images->first()->path) }}" alt="Card image cap">
                                                <div class="card-body">
                                                    <p class="card-text">Marca: {{ $product->color }}</p>
                                                    {{--<p class="card-text">Tamaño: {{ $product->size }} {{ $product->size_type }}</p>
                                                    <p class="text-muted">{{ $product->created_at->format('d M, Y') }}</p>--}}
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <h2 class="text-center">Error</h2>
                                    @endforelse



                                </div>


                            </div>
                            <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="product-tab-2">
                                @forelse ($post->products as $product)
                                    @forelse ($product->valuations as $valuation)
                                    <div class="review-block {{ $loop->iteration != 1? 'border-top mt-3 pt-3':'' }}">
                                        <p class="review-text font-italic m-0">“{{ $valuation->comment }}”</p>
                                        <div class="rating-star mb-4">
                                            @for ($i = 0; $i < $valuation->rating; $i++)
                                            <i class="fa fa-fw fa-star"></i>
                                            @endfor
                                        </div>
                                        <span class="text-dark font-weight-bold">{{ $valuation->user->name }}</span><small class="text-mute"> ({{ $valuation->product->color }}) ({{ $valuation->product->size }} {{ $valuation->product->size_type }})</small>
                                    </div>
                                    @empty
                                        
                                    @endforelse
                                    
                                @empty
                                    
                                @endforelse
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>







        </div>
    </div>



@endsection