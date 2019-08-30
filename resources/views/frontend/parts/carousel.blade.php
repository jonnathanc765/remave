@if (count($categories) >= 3)
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-intro pb-60px">
                    <p>Categorías mas destacadas en la tienda</p>
                    <h2>Categorías <span class="section-intro__style">Populares</span></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="owl-carousel owl-theme hero-carousel">
        @forelse($categories as $category)
            <div class="hero-carousel__slide">
                <img src="{{ Storage::url($category->image) }}" alt="" class="img-fluid">
                <a href="{{ route('categories.show',$category) }}" class="hero-carousel__slideOverlay">
                    <h3>{{ $category->name }}</h3>
                    <p>{{ $category->description }}</p>
                </a>
            </div>
        @empty 
        @endforelse
    </div>
@endif