@extends('frontend.layouts.app')

@section('title')
Inicio
@endsection

@section('home')
active
@endsection

@section('content')

<!--================ nav secundario =================-->
@include('frontend.layouts.navsecundario')
<!--================ nav secundario fin =================-->

<!--================ Hero banner start =================-->
<section class="hero-banner">
    @include('frontend.parts._hero-banner')
</section>
<!--================ Hero banner start =================-->

@if ($data['information'])
{{-- ================ Aviso Start ================ --}}
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info text-center" role="alert">
                {{ $data['information']->value }}
            </div>
        </div>
    </div>
</div>
{{-- ================ Aviso End ================ --}}    
@endif

<!--================ Hero Carousel start =================-->
<section class="section-margin mt-0">
    @include('frontend.parts.featuredStores')
</section>
<!--================ Hero Carousel end =================-->

<!-- ================ trending product section start ================= -->
<section class="section-margin calc-60px">
    @include('frontend.parts.trending')
</section>
<!-- ================ trending product section end ================= -->

@if ($data['centralHighBanner'] != null)
<!-- ================ offer section start ================= -->
<section class="offer" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 20px 30px"
    data-top-bottom="background-position: 0 20px" style="background: url('') right center no-repeat;">
    <div class="container-fluid position-relative">

        <img src="{{ Storage::url($data["centralHighBanner"]->path) }}" style="width:100%;height:100%;">
        {{--<a class="button button--active mt-3 mt-xl-4"
            href="{{ route('shop.show',$data["centralHighBanner"]->shop->id) }}"
            style="position:absolute;right:12px;bottom:6px;">
            Compra Ahora
        </a>--}}
    </div>
</section>
<!-- ================ offer section end ================= -->
@endif

<!-- ================ Best Selling item  carousel ================= -->
<section class="section-margin calc-60px">
    <div class="container">
        <div class="section-intro pb-60px">
            <p>Artículos populares en el sitio.</p>
            <h2><span class="section-intro__style">Mas Vendidos</span></h2>
        </div>
        <div class="owl-carousel owl-theme s_Product_carousel" id="bestSellerCarousel">
            @each('frontend.parts._best-sellers', $bestSellers, 'product')
        </div>
    </div>
</section>
<!-- ================ Best Selling item  carousel end ================= -->

@if ($data['centralLowBanner'] != null)
<section class="offer" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 20px 30px"
    data-top-bottom="background-position: 0 20px"
    style="background: url('{{ Storage::url($data["centralLowBanner"]->path) }}') right center no-repeat;">
    <div class="container-fluid position-relative">

        <img src="{{ Storage::url($data["centralLowBanner"]->path) }}" style="width:100%;height:100%;">
       {{-- <a class="button button--active mt-3 mt-xl-4"
            href="{{ route('shop.show',$data["centralLowBanner"]->shop->id) }}"
            style="position:absolute;right:12px;bottom:6px;">
            Compra Ahora
        </a>--}}
</section>
@endif

{{-- <!-- ================ Subscribe section start ================= -->
<section class="subscribe-position">
    @include('frontend.parts.newsletter')
</section>
<!-- ================ Subscribe section end ================= --> --}}

@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        function menuCategory() {
            navItem = document.querySelectorAll('.nav-secundario ul.main > li');
            if ($(window).width() > 769) {

                navItem.forEach((item, index) => {
                    item.addEventListener('mouseover', (e) => {
                        submenu = item.querySelector('.submenu');
                        submenu.style.display = "flex";
                    });

                    item.addEventListener('mouseleave', (e) => {
                        submenu = item.querySelector('.submenu')
                        var isHover = submenu.matches(':hover') ? true : false;
                        if (isHover) {
                            submenu.style.display = "flex"
                        } else {
                            submenu.style.display = "none"
                        }
                    })
                });

            } else if ($(window).width() <= 769) {

                navItem.forEach((item, index) => {
                    item.addEventListener('click', (e) => {
                        submenu = item.querySelector('.submenu');
                        submenu.classList.toggle('item-active');
                    });
                });
            }
        }

        menuCategory();
        $(window).resize(function () {
            menuCategory();
        });
    });

</script>

<script src="js/siema.min.js"></script>

<script>
    class SiemaWithDots extends Siema {
        addDots() {
            // create a contnier for all dots
            // add a class 'dots' for styling reason
            this.dots = document.createElement('div');
            this.dots.classList.add('dots');

            // loop through slides to create a number of dots
            for (let i = 0; i < this.innerElements.length; i++) {
                // create a dot
                const dot = document.createElement('button');

                // add a class to dot
                dot.classList.add('dots__item');

                // add an event handler to each of them
                dot.addEventListener('click', () => {
                    this.goTo(i);
                })

                // append dot to a container for all of them
                this.dots.appendChild(dot);
            }

            // add the container full of dots after selector
            this.selector.parentNode.insertBefore(this.dots, this.selector.nextSibling);
        }

        updateDots() {
            // loop through all dots
            for (let i = 0; i < this.dots.querySelectorAll('button').length; i++) {
                // if current dot matches currentSlide prop, add a class to it, remove otherwise
                const addOrRemove = this.currentSlide === i ? 'add' : 'remove';
                this.dots.querySelectorAll('button')[i].classList[addOrRemove]('dots__item--active');
            }
        }
    }

    // instantiate new extended Siema
    const carouselBanners = new SiemaWithDots({

        selector: '.siema-banner-ppal',
        perPage: 1,
        loop: true,
        // on init trigger method created above
        onInit: function () {
            this.addDots();
            this.updateDots();
        },

        // on change trigger method created above
        onChange: function () {
            this.updateDots()
        },
    });

    var btnPrev = document.querySelector('.carousel-btn button:first-of-type');
    var btnNext = document.querySelector('.carousel-btn button:last-of-type');

    btnPrev.addEventListener('click', () => carouselBanners.prev());
    btnNext.addEventListener('click', () => carouselBanners.next())

</script>
@endsection
