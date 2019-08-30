<footer class="footer">
    <div class="footer-area">
        <div class="container">
            <div class="row section_gap">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
                        @if ($meta->where('name', 'mission')->first())
                            
                        <h4 class="footer_title large_title">Nosotros</h4>
                        <p>
                            {{ $meta->where('name', 'mission')->first()->value }}
                        </p>
                        
                        @endif
                    </div>
                </div>
                <div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title">Enlaces Rapidos</h4>
                        <ul class="list">
                            <li><a href="{{ route('home') }}">Inicio</a></li>
                          {{--  <li><a href="{{ route('categories.index') }}">Categorias</a></li>--}}
                            <li><a href="{{ route('contact') }}">Contacto</a></li>
                            <li><a href="{{ route('faqs') }}">Preguntas Frecuentes</a></li>
                            {{--
                                <li><a href="{{ route('how-add') }}">Registrar un Producto</a></li>--}}
                            <li><a href="{{ route('how-buy') }}">Como Comprar</a></li>
                            <li><a href="{{ route('shipping') }}">Envíos</a></li>
                            {{--<li><a href="{{ route('terms') }}">Términos y condiciones</a></li>--}}
                            {{--<li><a href="{{ route('forbidden') }}">Articulos Prohibidos</a></li>--}}
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget instafeed">
                        <h4 class="footer_title">Productos</h4>
                        <ul class="list instafeed d-flex flex-wrap">
                            @foreach ($productsFooter as $product)
                            <li>
                                <a href="{{ route('single-product', $product->code) }}">
                                    <img class="img-fluid" src="{{ Storage::url($product->images->first()->path) }}"
                                        alt="">
                                </a>
                            </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
                <div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title">Contactanos</h4>
                        <div class="ml-40">
                            <p class="sm-head">
                                <span class="fa fa-location-arrow"></span>
                                Dirección
                            </p>
                            <p>
                                
                                @if ($meta->isNotEmpty())
                                {{ $meta->where('name', 'Direccion')->first()->value }}
                                @endif
                            </p>

                            <p class="sm-head">
                                <span class="fa fa-phone"></span>
                                Numero de contacto
                            </p>
                            <p>
                                @if ($meta->isNotEmpty())
                                {{ $meta->where('name', 'Telefono')->first()->value }}<br>
                                @endif
                            </p>

                            <p class="sm-head">
                                <span class="fa fa-envelope"></span>
                                Email
                            </p>
                            <p>
                                @if ($meta->isNotEmpty())
                                {{ $meta->where('name', 'Email')->first()->value }}<br>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     {{--<h5 class="font-weight-bold text-uppercase mt-3 mb-4"> En las redes sociales</h5>
      <div id="instafeed"></div>

    <ul class="list-unstyled list-inline text-center">
  <li class="list-inline-item">
    <a class="btn-floating btn-fb mx-1">
      <a href="https://www.instagram.com/moovets/" target="_blank" style="font-size: 24px !important;" title="Síguenos en Instagram"><i class="fa fa-instagram"> </i></a>
    </a>
  </li>
  <li class="list-inline-item">
    <a class="btn-floating btn-fb mx-1">
      <a href="https://www.facebook.com/moovets/" target="_blank" style="font-size: 24px !important;" title="Síguenos en Facebook"><i class="fa fa-facebook"> </i></a>
    </a>
  </li>--}}

    <div class="footer-bottom">
        <div class="container">
            <div class="row d-flex">
                <p class="col-lg-12 footer-text text-center">
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());

                    </script> Todos los derechos reservados 
                </p>
            </div>
        </div>
    </div>
</footer>
