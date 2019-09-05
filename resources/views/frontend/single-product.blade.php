@extends('frontend.layouts.app')

@section('title', $product->name)

@section('content')

@include('frontend.parts._start-banner')

<!--================Single Product Area =================-->
{{-- <div id="app" class="product_image_area">
    <card img="{{ asset('img/product/product-sm-2.png') }}"></card>

</div> --}}


<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="s_product_images">
                <ul>
                        @foreach ($product->images as $image)
                    
                        <li>
                                <img class="img-single img-fluid" src="{{ Storage::url($image->path) }}" alt="">
                        </li>
                        @endforeach
                </ul>
            </div>
            <div class="col-lg-6 d-flex justify-content-center flex-column">
                {{-- Fotos individuales --}}
                <div class="siema-single-prd">
                    @foreach ($product->images as $image)
                    
                    <div class="single-prd-item d-flex justify-content-center align-items-center">
                        <img class="img-single img-fluid img-zoom" src="{{ Storage::url($image->path) }}" data-zoom="{{ Storage::url($image->path) }}" alt="">
                        
                    </div>
                    @endforeach
                </div>


                <div class="my-5">
                    {{-- Articulos del mismo post con relacion --}}
                    {{-- Miniaturas de otras opciones --}}
                    @if (!$data->equalColor)
                    {{-- Diferentes colores --}}
                    <div class="col-12 col-md-5 d-block d-md-inline-block">
                        <div class="col-md-12">
                            <p>Color Actual: {{ $product->color }}</p>
                            <h3>Colores</h3>
                            <div class="thumbnail">
                                @foreach ($data['productColors'] as $thumbnail)
                                <a @if ($product->color == $thumbnail->color)
                                    style="border: 2px solid #2d7dff"
                                    @endif
                                    href="{{ route('single-product',$thumbnail->code) }}"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{ $thumbnail->color }}">
                                    <img class="img-thumbnail"
                                        src="{{ Storage::url($thumbnail->images->first()->path) }}">
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @else
                    {{-- Solo un color --}}
                    <div class="row">
                        <div class="col-md-12">
                            {{--<p>Marca: {{ $product->color }}</p>--}}
                        </div>


                    </div>
                    @endif

                    @if (!$data->equalSize)
                    <div class="col-12 col-md-5 d-block d-md-inline-block mt-5 mt-md-0">
                        {{-- Diferentes Tamaños --}}
                        {{--<p>Tamaño Actual: {{ $product->size }} {{ $product->size_type }}</p>
                        <div class="col-md-12">
                            <h3>{{ $product->size_type }}</h3>
                            <select class="form-control" id="size-select">
                                @foreach ($data->sizes as $item)
                                <option value="{{ route('single-product',$item->code) }}"
                                    {{ $item->size == $product->size? 'selected': '' }}>{{ $item->size }}
                                    {{ $product->size_type }}</option>
                                @endforeach
                            </select>
                        </div>--}}
                    </div>
                    @else
                    {{-- Solo un tamaño --}}
                    <div class="row">
                        <div class="col-md-12">
                            {{--<p>{{ $product->size }} {{ $product->size_type }}</p>--}}
                        </div>
                    </div>
                    @endif
            </div>


            </div>
            
            <div class="s_product col-lg-5 position-relative">
                <span class="zoom-container"></span>
                <div class="s_product_text">
                    <h3>{{ $product->name }}</h3>
                              
                    @if ($product->off > 0)
                        <small class="text-danger">Este producto tiene descuento {{ $product->off }}% de descuento</small>
                        <h2>
                            <span class="linea">
                                <span>$ {{ $product->price }}</span>
                            </span>  
                            <span class="text-succes"> 
                                <i class="fa fa-arrow-right mx-2 text-muted"></i> $ {{ $product->price() }}
                            </span>
                        </h2>
                    @else
                    <h2>
                        <span class="text-succes"> 
                            $ {{ $product->price() }}
                        </span>
                    </h2>
                    @endif

                    <ul class="list">
                        <li>
                            <a href="#"><span>Categoria</span> : {{ $product->subcategory->name }}</a>
                        </li>
                    </ul>
                    <p> Stock del Producto:  {{$product->quantity }}</p>
                    <p>{{ $product->description }}</p>
                    
                    <form action="{{ route('cart.store', ['productCode' => $product->code]) }}" method="post" id="cartForm">
                        @csrf
                        @if (Session::has('error'))
                            <small class="text-danger">{{ Session::get('error') }}</small>
                        @endif

                        <div id="app">
                            <counter></counter>
                        </div>
                        
                        <button class="button primary-btn" href="" type="submit">Agregar al Carrito</button>
                    </form>

                
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                    aria-selected="true">Descripción</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                    aria-selected="false">Especificaciones</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" id="comment-tab" data-toggle="tab" href="#comment" role="tab" aria-controls="comment"
                    aria-selected="false">Preguntas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
                    aria-selected="false">Reseñas</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">

            {{-- Descripcion del producto --}}
           

            <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                <p>{{ $product->post->description }}</p>
            </div>

            {{-- Detalles de este producto --}}
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <h5>Marca</h5>
                                </td>
                                <td>
                                    <h5>{{ $product->color }}</h5>
                                </td>
                            </tr>
                            {{--<tr>
                                <td>
                                    <h5>Tamaño</h5>
                                </td>
                                <td>
                                    <h5>{{ $product->size }} {{ $product->size_type }}</h5>
                                </td>
                            </tr>--}}
                            <tr>
                                <td>
                                    <h5>Precio</h5>
                                </td>
                                <td>
                                    <h5>
                                          ${{ $product->price() }}
                                    </h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Descripción</h5>
                                </td>
                                <td>
                                    <h5> {{ $product->description }}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Stock de Producto</h5>
                                </td>
                                <td>
                                    <h5> {{ $product->quantity}}</h5>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Comentarios de esta publicacion --}}
            <div class="tab-pane fade show active" id="comment" role="tabpanel" aria-labelledby="comment-tab">
                <div class="row">
                    <div class="col-lg-6 order-lg-1 order-2">
                        <div class="comment_list">
                            @foreach ($product->post->comments as $comment)
                            <div class="review_item">
                                <div class="media">
                                    <div class="d-flex d-inline-block">
                                        <img class="rounded-circle img-avatar" src="{{ Storage::url($comment->user->avatar) }}"
                                            alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4>{{ $comment->user->name }}</h4>
                                        <h5>{{ $comment->created_at->format('d/m/Y h:m A') }}</h5>
                                        @if(Auth::check() && Auth::user()->can('update', $product->post) && !isset($comment->answer) && Auth::user()->id == $product->post->user_id)
                                        <a class="reply_btn" id="reply_btn_{{ $comment->id }}">Responder</a>
                                        @endif
                                    </div>
                                </div>
                                <p>{{ $comment->comment }}</p>
                            </div>
                            @if ($comment->answer)
                            <div class="review_item reply">
                                <div class="media">
                                    <div class="d-flex">
                                        <img class="rounded-circle img-avatar" src="{{ Storage::url($product->post->shop->user->avatar) }}"
                                            alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4>{{ $product->post->shop->user->name }}</h4>
                                        <h5>{{ $comment->updated_at->format('d/m/Y h:m A') }}</h5>
                                    </div>
                                </div>
                                <p>{{ $comment->answer }}</p>
                            </div>
                            @else
                            @can('update', $product->post)
                            <div class="col-lg-12 answer-form reply_btn_{{ $comment->id }}">
                                <div class="review_box">
                                    <h4>Responder a este comentario</h4>
                                    <form class="row contact_form" action="{{ route('comment.update', [$product->post->id, $comment->id]) }}"
                                        method="POST" id="contactForm" novalidate="novalidate">
                                        @csrf
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea class="form-control" name="answer" id="answer" rows="1"
                                                    placeholder="Mensaje"></textarea>
                                            </div>
                                            @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif
                                            @if (Session::has('success'))
                                            <div class="alert alert-success">
                                                <ul>
                                                    <li>{{ Session::get('success') }}</li>
                                                </ul>
                                            </div>
                                            @endif
                                        </div>
                                        @if ($errors->any())
                                        @foreach ($errors as $error)
                                        <div class="errors"></div>
                                        @endforeach
                                        @endif
                                        <div class="col-md-12 text-right">
                                            <button type="submit" value="submit" class="btn primary-btn">Enviar
                                                Comentario</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @endcan
                            @endif

                            @endforeach

                        </div>
                    </div>
                    @if (Auth::check() && Auth::user()->id != $product->post->user_id)
                    <div class="col-lg-6 order-lg-2 order-1 pb-4">
                        <div class="review_box">
                            <h4>Pregunta al vendedor</h4>
                            <form class="row contact_form" action="{{ route('comment.store', $product->post->id) }}"
                                method="POST" id="contactForm" novalidate="novalidate">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="comment" id="comment" rows="2" placeholder="Mensaje"></textarea>
                                    </div>
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    @if (Session::has('success'))
                                    <div class="alert alert-success">
                                        <ul>
                                            <li>{{ Session::get('success') }}</li>
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                                @if ($errors->any())
                                    @foreach ($errors as $error)
                                        <div class="errors"></div>
                                    @endforeach
                                @endif
                                <div class="col-md-12 text-right">
                                    <button type="submit" value="submit" class="btn primary-btn">Preguntar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                <div class="row">
                    <div class="col-6">
                        <div class="row total_rate">
                            <div class="col-6">
                                <div class="box_total">
                                    <h5>Promedio</h5>
                                    <h4>{{ number_format($product->post->averagevaluation(),1) }}</h4>
                                    <h6>({{ $product->valuations->count() }} Reseñas)</h6>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="rating_list">
                                    <h3>Basado en {{ $product->valuations->count() }} Reseñas</h3>
                                    <ul class="list">
                                        <li>
                                            <a href="#">
                                                5  
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                4 
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                3 
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                2  
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                1 
                                                <i class="fa fa-star"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        @forelse ($product->valuations as $valuation)
                        <div class="review_list">
                            <div class="review_item border-bottom mb-4 pb-4">
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="{{ Storage::url($valuation->user->avatar) }}" alt="" style="border-radius: 50%;">
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
                        </div>
                        @empty
                        @endforelse
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

<!--================End Product Description Area =================-->

@include('frontend.parts._related-products')
@endsection

@section('scripts')

<script src="{{ asset('js/Drift.js') }}"></script>

<script>

zoomImages = document.querySelectorAll('.img-zoom');

for (var i = 0; i < zoomImages.length; i++) {

  var zoomImage = zoomImages[i];
  var contenedorPreview = document.querySelector(".zoom-container");
  
  new Drift(zoomImage, {
    paneContainer: contenedorPreview,
    onShow: function(){
        contenedorPreview.style.display = 'block';
    },
    onHide: function(){
        contenedorPreview.style.display = 'none';
    },
    zoomFactor:2
  });
}



</script>

<script src="{{ asset('js/vue/bundle.js') }}"></script>
<script>
    $('#size-select').change(function() {
        var uri = $(this).val();
        location.href = uri;
    });

</script>
<script src="{{ asset('js/siema.min.js') }}"></script>

<script>
  document.addEventListener('DOMContentLoaded', function(){

var imagenes = document.querySelectorAll('.s_product_images img');

var siema_single_prd = new Siema({

    selector: '.siema-single-prd',
    perPage: 1,
    loop: true,

    onChange: function () {
        updateImage();
    },
});
updateImage();


imagenes.forEach(function (img, i) {
    img.addEventListener('click', function () {
        siema_single_prd.goTo(i);
        updateImage();

    });
});

function updateImage() {
    // loop through all dots
    for (let i = 0; i < imagenes.length; i++) {
        // if current dot matches currentSlide prop, add a class to it, remove otherwise
        const addOrRemove = siema_single_prd.currentSlide === i ? 'add' : 'remove';
        imagenes[i].classList[addOrRemove]('active');
    }
}


})


</script>
@endsection