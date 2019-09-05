<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Productos en Oferta</h2>
        </div>
    </div>
    <div class="row">
        @foreach ($data['featuredStores'] as $banner)
            <div class="col-lg-4 col-md-4 col-sm-6 col-12 my-3">
                {{--<a href="{{ route('shop.show', $banner->shop_id) }}">--}}
                    <img src="{{ Storage::url($banner->path) }}"  class="rounded img-fluid" width="100%" style="max-height:285px;">
                </a>
            </div>
        @endforeach
    </div>
</div>