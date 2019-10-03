<div class="card text-center card-product shadow-lg">
    <div class="card-product__img div-product">
        <a href="{{ route('single-product', $product->code) }}">
            <img class="img-fluid img-product" style="" src="{{ Storage::url($product->images->first()->path) }}" alt="{{ $product->name }}">
        </a>
        <ul class="card-product__imgOverlay">
            <li>
                <a class="btn btn-primary" href="{{ route('single-product', $product->code) }}" role="button">
                    <i class="ti-eye"></i>
                </a>
            </li>
            <li>
                {{-- Boton del carrito --}}
                {{--<a class="btn btn-primary" href="{{ route('cart.store', $product->code) }}" role="button" onclick="event.preventDefault(); document.getElementById('cart.store{{ $product->code }}').submit();">
                    <i class="ti-shopping-cart"></i>
                </a>--}}
                {{-- Formulario para enviar un producto al carrito --}}
                <form id="cart.store{{ $product->code }}" action="{{ route('cart.store', $product->code) }}" method="POST" style="display: none;">
                    <input type="hidden" name="quantity" value="1">
                    @csrf
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
            $ {{ $product->price() }}
        </p>
    </div>
</div>
