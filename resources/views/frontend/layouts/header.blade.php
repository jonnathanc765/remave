<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand logo_h" href="{{ route('home') }}"><img src="{{ asset('img/logito.png') }}"
                        class="img-fluid" alt="" style="max-width: 60px"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse offset"  id="navbarSupportedContent">

<h2 align="center">Remave Shopps</h2>
                    {{--<ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                        <li class="nav-item @yield('shipping')">
                            <a class="nav-link" href="{{ route('shipping') }}">Envios</a>
                        </li>
                        <li class="nav-item @yield('how-add')">
                            <a class="nav-link" href="{{ route('how-add') }}">Como Vender</a>
                        </li>
                        <li class="nav-item @yield('how-buy')">
                            <a class="nav-link" href="{{ route('how-buy') }}">Como Comprar</a>
                        </li>
                    </ul>--}}

                    <ul class="nav-shop ml-auto">
                        <li class="nav-item">
                            {!! Form::open(['method'=>'GET','route'=>'search.product','class'=>'','role'=>'search'])
                            !!}
                            <div class="searchbar">
                                <input class="search_input" type="text" name="s" placeholder="Buscar...">
                                <button class="btn btn-default-sm search_icon" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                            {!! Form::close() !!}
                        </li>
                        @if (Auth::check())
                        <li class="nav-item">
                            @section('count')
                            <button>
                                <a href="{{ route('cart.index') }}"><i class="ti-shopping-cart"></i><span class="nav-shop__circle">{{ Cart::instance('shopping')->count() }}</span></a>
                            </button>
                            @show
                        </li>
                        @endif
                        @if (Auth::check())
                        {{-- Boton de logout --}} 
                        <li class="nav-item">
                            <a 
                            {{-- Redirecciones de acuerdo a sus roles --}}
                            @role('superadmin')
                            href="{{ route('dashboard') }}"
                            @endrole

                            @role('provider')
                            href="{{ route('provider') }}"
                            @endrole

                            @role('client')
                            href="{{ route('dashboard.client') }}"
                            @endrole
                            {{-- Fin de redirecciones de acuerdo a sus roles --}}
                            
                            class="button button-header">
                                Mi cuenta
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="button button-header" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                                @method('POST')
                            </form>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="button button-header" href="{{ route('login') }}">Entrar</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
