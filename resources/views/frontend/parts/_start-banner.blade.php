@if ($product->post->shop->banner()->exists())
<section class="shop-banner-area" id="category"
    style="background-image: url({{ Storage::url($product->post->shop->banner->path) }})">
    <div class="align-items-end container d-flex h-100 justify-content-end">
        <a class="mb-3" href="{{ route('shop.show', $product->post->shop) }}">
            <button class="button btn btn-primary" type="button">Visita nuestra tienda</button>
        </a>
        <style>
            .align-items-end.container.d-flex.h-100.justify-content-end a button.button.btn.btn-primary:hover {
                background: white;
                color: #384aeb;
                border: 1px solid transparent;
            }

        </style>
    </div>
</section>
@else
<div class="align-items-end container d-flex h-100 justify-content-end mt-4">
    <a class="mb-3" href="{{ route('shop.show', $product->post->shop) }}">
        <button class="button btn btn-primary" type="button">Visita nuestra tienda</button>
    </a>
</div>

@endif
