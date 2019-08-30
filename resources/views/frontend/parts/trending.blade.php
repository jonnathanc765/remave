<div class="container">
    <div class="section-intro pb-60px">
        <p>Artículos recientes en la tienda.</p>
        <h2>Articulos <span class="section-intro__style">Recientes</span></h2>
    </div>
    <div class="row">
        @each('frontend.parts._product-card', $lastestProducts, 'product')
    </div>
</div>
