@if ($banners->isNotEmpty() && $banners->contains('position', 1))
<div class="container-fluid p-0">
    <div class="carousel-banners row no-gutters">
        <div class="col-12">
            <div class="siema-banner-ppal">
                @foreach ($banners as $banner)
					@if ($banner->position == 1)
                        <div class="container-content-carousel">
                        <img src="{{ Storage::url($banner->path) }}" alt="">
                        {{--<a href="{{ route('shop.show', $banner->shop) }}" class="button btn btn-primary">Ir a la tienda</a>--}}
                    </div>
                        
					@endif
                @endforeach
            </div>
            @if ($banners->where('position', 1)->count() > 1)
            <div class="carousel-btn">
                <button class="btn"><i class="fa fa-angle-left"></i></button>
                <button class="btn"><i class="fa fa-angle-right"></i></button>
            </div>
            @endif
        </div>
    </div>
</div>
@endif

