<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--
    <meta name="robots" content="{{ $config['meta-robots'] }}">
    <meta name="google" content="nositelinkssearchbox">
    <meta name="author" content="{{ $config['meta-author'] }}">
    <meta name="subjetc" content="{{ $config['meta-subjetc'] }}"> --}}
    <meta name="Language" content="">
    <meta name="revisit-after" content="">
    <meta charset="UTF-8" />
    {{--
    <meta http-equiv="X-UA-Compatible" content="ie=edge" /> --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/stylesdashboard.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert2.min.css') }}">
    @yield('css')



    <link rel="stylesheet" href="{{ asset('css/estilostabla.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>@yield('title')</title>
</head>


<body>
    <div class="container-fluid">
        <div class="row contenedor-ppal">
            <aside class="col menu-opciones">
                <div class="logo-aside mt-2 mb-4 d-flex justify-content-center">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo Mishopp">
                </div>
                <ul>
                    {{-- Aqui comienza las opciones de un administrador, solo el usuario que tenga el role => superadmin prodra ver estas vistas --}}
                    @role('superadmin')

                    <li class="@yield('administrator')">
                        <a href="{{ route('administrator') }}"><i class="far fa-chart-bar"></i>Dashboard</a>
                    </li>
                    <li class="@yield('reports')">
                        <a href="{{ route('reports.index') }}"><i class="fas fa-chart-line"></i>Reportes</a>
                    </li>
                    <li class="@yield('clients')">
                        <a href="{{ route('clients') }}"><i class="fas fa-users"></i>Clientes</a>
                    </li>
                    <li class="@yield('providers')">
                        <a href="{{ route('providers') }}"><i class="fas fa-truck"></i>Provedores</a>
                    </li>
                    <li class="@yield('faqs')">
                        <a href="{{ route('faq') }}"><i class="far fa-question-circle"></i>Preguntas Frecuentes</a>
                    </li>
                    <li class="@yield('banners')">
                        <a href="{{ route('banner') }}"><i class="fas fa-window-maximize"></i></i>Banners</a>
                    </li>
                    <li class="@yield('product')">
                        <a href="{{ route('products') }}"><i class="fas fa-box-open"></i>Productos</a>
                    </li>
                    <li class="@yield('orders')">
                        <a href="{{ route('orders') }}"><i class="fas fa-home"></i>Ordenes</a>
                    </li>
                    <li class="@yield('categories')">
                        <a href="{{ route('category.list') }}"><i class="fas fa-tags"></i>Categorias</a>
                    </li>
                    <li class="@yield('config')">
                        <a href="{{ route('configuration.index') }}"><i class="fas fa-cogs"></i>Configuración</a>
                    </li>
                    <li class="@yield('payment')">
                        <a href="{{ route('payments') }}"><i class="fas fa-cogs"></i>Administracion de Pago</a>
                    </li>
                    <li class="@yield('testimonies')">
                        <a href="{{ route('testimonies') }}"><i class="fas fa-users"></i>Testimonios</a>
                    </li>
                     <li class="@yield('evaluationprovider')">
                        <a href="{{ route('evaluationprovider') }}"><i class="fas fa-users"></i>Valoracion de Proveedores</a>
                    </li>
                    {{-- Copiar para agregar un nuevo item al menú --}}

                       
                    @endrole

                    @if(Auth::user()->hasRole('client') && !Auth::user()->hasRole('provider'))
                    <li class="@yield('client')">
                        <a href="{{ route('dashboard.client') }}"><i class="far fa-chart-bar"></i>Dashboard</a>
                    </li>
                        @if (!Auth::user()->hasShop(Auth::user()->id))
                            <li class="@yield('datos.client')">
                                <a href="{{ route('dashboard.client.info') }}"><i class="fab fa-wpforms"></i>Hazte Proveedor</a>
                            </li>
                        @endif
                    @endif 

                    {{-- Aqui comienza las opciones de un proveedor, solo el usuario que tenga el role => provider prodra ver estas vistas --}}
                    @role('provider')
                    <li class="@yield('provider')">
                        <a href="{{ route('provider') }}"><i class="far fa-chart-bar"></i>Dashboard</a>
                    </li>
                    <li class="@yield('questions')">
                        <a href="{{ route('questions') }}"><i class="fas fa-comment-alt"></i>Preguntas</a>
                    </li>
                    <li class="@yield('orders')">
                        <a href="{{ route('orders.provider') }}"><i class="fas fa-home"></i>Ordenes</a>
                    </li>
                    <li class="@yield('reports')">
                        <a href="{{ route('product.provider') }}"><i class="fas fa-box-open"></i>Productos</a>
                    </li>
                    <li class="@yield('valorations')">
                        <a href="{{ route('valorations') }}"><i class="fas fa-box-open"></i>Mis Valoraciones</a>
                    </li>
                    <li class="@yield('banners')">
                        <a href="{{ route('listBanner') }}"><i class="fas fa-window-maximize"></i>Mis Banners</a>
                    </li>
                    {{-- Copiar para agregar un nuevo item al menú --}}
                    @endrole
                </ul>
            </aside>
            <nav class="nav-container d-flex align-items-center">

                <div class="opciones-usuario col-12 d-flex justify-content-end align-items-center">
                    @if (Auth::user()->avatar)
                        <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" class="user-avatar-sm">
                    @endif
                    <div class="dropdown-usuario mt-1 d-flex mr-3">
                        <p>{{ Auth::user()->name }}</p>
                    </div>
                    <div class="mensajes-usuario mr-4">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Cerrar Sesión</button>
                        </form>
                    </div>
                </div>
            </nav>
            <div class="contenido-pal row no-gutters">
                <div class="contenido-ppal">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    {{--  @else
    <li class="@yield('dashboard')">
        <a href="{{ route('dashboard.provider') }}"><i class="far fa-chart-bar"></i>Dashboard</a>
    </li>
    <li class="@yield('preguntas')">
        <a href="{{ route('dashboard.provider') }}"><i class="far fa-chart-bar"></i>Preguntas</a>
    </li>
    @endrole  --}}

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    @include('parts.sweetalert2')
    @yield('scripts')
</body>

</html>
