<section class="related-product-area section-margin--small mt-0">
    <div class="container">
        <div class="section-intro pb-60px">
            <p>Artículos relacionados con este producto.</p>
            <h2><span class="section-intro__style">Productos</span> Relacionados</h2>
        </div>
        <div class="row mt-30">
            @forelse ($relatedProducts as $products)
            <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
                @foreach ($products as $product)
                <div class="single-search-product-wrapper">
                    <div class="single-search-product d-flex">
                        <a href="{{ route('single-product', $product->code) }}">
                            <img src="{{ Storage::url($product->images->first()->path) }}" alt="{{ $product->name }}">
                        </a>
                        <div class="desc">
                            <a href="{{ route('single-product', $product->code) }}" class="text-truncate title">{{ $product->name }}</a>
                            <div class="price">${{ $product->price }}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @empty
                
            @endforelse
        </div>
    </div>
</section>
