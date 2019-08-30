<!-- ================ top product area start ================= -->
<section class="related-product-area section-margin--small mt-0">
    <div class="container">
        <div class="section-intro pb-60px">
            <p>Artículos populares en el sitio.</p>
            <h2><span class="section-intro__style">Mas Vendidos</span></h2>
        </div>
        <div class="row mt-30">
            @foreach ($bestSellers as $bestSeller)
            <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
                <div class="single-search-product-wrapper">
                    @foreach ($bestSeller as $product)
                    <div class="single-search-product d-flex">
                        <a href="{{ route('single-product', $product->code) }}">
                            <img src="{{ Storage::url($product->images->first()->path) }}" alt="">
                        </a>
                        <div class="desc">
                            <a href="{{ route('single-product', $product->code) }}" class="title text-truncate">{{ $product->name }}</a>
                            <div class="price">${{ $product->price }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- ================ top product area end ================= -->
