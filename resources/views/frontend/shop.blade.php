@extends('frontend.layouts.app')

@section('title')
{{ $shop->name }}
@endsection

@section('content')

<!-- ================ start banner area ================= -->
@if ($shop->banner()->exists())
<section class="shop-banner-area" id="category" style="background-image: url({{ Storage::url($shop->banner->path) }})">
    <div class="container h-100">

    </div>
</section>
@endif
<!-- ================ end banner area ================= -->

<!--================Blog Area =================-->
<section class="blog_area single-post-area py-80px section-margin--small">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post row">

                    <div class="col-md-12 mb-4">
                        <h2 class="text-center mb-4">Productos Registrados</h2>
                    </div>

                    @forelse ($data->products as $product)
                    <div class="col-md-6 col-lg-6 col-xl-4 col-sm-12">
                        <div class="card text-center card-product shadow-lg">
                            <div class="card-product__img div-product">

                                <a href="{{ route('single-product', $product->code) }}">
                                    <img class="img-fluid img-product" style=""
                                        src="{{ Storage::url($product->images->first()->path) }}"
                                        alt="{{ $product->name }}">
                                </a>

                                <ul class="card-product__imgOverlay">
                                    <li>
                                        <a class="btn btn-primary" href="{{ route('single-product', $product->code) }}"
                                            role="button">
                                            <i class="ti-eye"></i>
                                        </a>
                                    </li>
                                    <li>
                                        {{-- Boton del carrito --}}
                                        <a class="btn btn-primary" href="{{ route('cart.store', $product->code) }}"
                                            role="button"
                                            onclick="event.preventDefault(); document.getElementById('cart.store{{ $product->code }}').submit();">
                                            <i class="ti-shopping-cart"></i>
                                        </a>
                                        {{-- Formulario para enviar un producto al carrito --}}
                                        <form id="cart.store{{ $product->code }}"
                                            action="{{ route('cart.store', $product->code) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            {{-- <input type="hidden" name="quantity" value="1"> --}}
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <p>{{ $product->subcategory->name }}</p>
                                <h4 class="card-product__title text-truncate">
                                    <a href="{{ route('single-product', $product->code) }}">
                                        {{ $product->name}}
                                    </a>
                                </h4>
                                <p class="card-product__price">
                                    ${{ $product->price }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <h2 class="text-center">Esta tienda aún no tiene productos registrados</h2>
                    @endforelse
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Buscar un producto">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="lnr lnr-magnifier"></i>
                                </button>
                            </span>
                        </div>
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget author_widget">
                        @if ($shop->user->badges->isNotEmpty())
                        <div class="row d-flex align-content-around">
                            @foreach ($badges as $badge)
                            <div class="col-4">
                                <img class="@foreach($shop->user->badges as $userBadge)
																	{{ ($userBadge->id =! $badge->id) ? 'badge_img' : ''}}
																@endforeach rounded-circle img-fluid" src="{{ asset('img/badges/'.$badge->icon.'.png') }}"
                                    title="{{ $badge->description }}">
                                <span>{{ $badge->name }}</span>
                            </div>
                            @endforeach
                        </div>
                        @endif
                        <h4>{{ $shop->name }}</h4>

                        <p>
                            {{ $shop->description }}LOL
                        </p>
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Productos destacados</h3>
                        @forelse ($data->top as $product)
                        <div class="media post_item">
                            <img class="img-top-post" src="{{ Storage::url($product->images->first()->path) }}"
                                alt="{{ $product->name }}">
                            <div class="media-body">
                                <a href="{{ route('single-product', $product->code) }}">
                                    <h3>{{ $product->name }}</h3>
                                </a>
                                <p>{{ $product->updated_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        @empty
                        <h5 class="text-center">No hay productos registrados</h5>
                        @endforelse
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget ads_widget">
                        <a href="#">
                            <img class="img-fluid" src="img/blog/add.jpg" alt="">
                        </a>
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Productos por categorías</h4>
                        <ul class="list cat-list">
                            <li>
                                <a href="#" class="d-flex justify-content-between">
                                    <p>Technology</p>
                                    <p>37</p>
                                </a>
                            </li>

                        </ul>
                    </aside>
                </div>
            </div>
            <div class="col-lg-8 mt-5 col-md-8 col-sm-12">
                <div class="review_list">
                    <h4>{{ $shop->user->providerValuations->count() }} Comentarios</h4>
                    @forelse ($shop->user->providerValuations as $valuation)
                    <div class="review_item">
                        <div class="media">
                            <div class="d-flex">
                                <img src="{{ Storage::url($valuation->user->avatar) }}" alt=""
                                    style="border-radius: 50%;">
                            </div>
                            <div class="media-body">
                                <h4>{{ $valuation->user->name }}</h4>
                                @for ($i = 0; $i < $valuation->rating; $i++)
                                    <i class="fa fa-star"></i>
                                    @endfor
                            </div>
                        </div>
                        <p>
                            {{ $valuation->comment }}
                        </p>
                    </div>
                    @empty
                    <h2 class="text-center">No existen Valoraciones o testimonios aun</h2>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
