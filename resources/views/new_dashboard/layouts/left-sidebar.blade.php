<!-- ============================================================== -->
<!-- left sidebar -->
<!-- ============================================================== -->
<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>

                    @role('superadmin')
                    <li class="nav-item ">
                        <a class="nav-link @yield('dashboard')" href="{{ route('dashboard') }}">
                            <i class="fa fa-fw fa-user-circle"></i>Dashboard
                            <span class="badge badge-success">6</span>
                        </a>
                    </li>
                    <li class="nav-divider">
                        Administrar
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('users') @yield('providers')" href="#" data-toggle="collapse"
                            aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3">
                            <i class="fas fa-users"></i>
                            Usuarios
                        </a>
                        <div id="submenu-3" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link @yield('users') " href="{{ route('clients.index') }}">
                                        <i class="fa fa-user"></i>
                                        Clientes
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @yield('providers')" href="{{ route('providers') }}">
                                        <i class="fas fa-store-alt"></i>
                                        Provedores
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('faqs.index') }}"
                            class="nav-link @yield('faqs.index') @yield('faqs.create') @yield('faqs.edit')">
                            <i class="fa fa-question"></i>
                            FAQ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('banner') }}" class="nav-link @yield('banners')" data-toggle="collapse"
                            aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i
                                class="fa fa-images"></i>Banners</a>
                        <div id="submenu-4" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('banner', $position = 1) }}">
                                        Banner Principal
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('banner', $position = 2) }}">
                                        Banner de Categoria
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('banner', $position = 3) }}">
                                        Banner Central Alto
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('banner', $position = 4) }}">
                                        Banner Central Bajo
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('banner', $position = 5) }}">
                                        Banner de tiendas destacadas
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('banner.shop.create') }}" class="nav-link @yield('banners.shop')">
                            <i class="fa fa-images"></i>
                            Banners de Tiendas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('products') }}" class="nav-link @yield('products')">
                            <i class="fa fa-gifts"></i>
                            Productos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('orders.index') }}" class="nav-link @yield('orders')">
                            <i class="fa fa-file-invoice-dollar"></i>
                            Ordenes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.categories.index') }}" class="nav-link @yield('categories')">
                            <i class="fa fa-stream"></i>
                            Categorias
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('subcategories.index') }}" class="nav-link @yield('subcategories')">
                            <i class="fa fa-stream"></i>
                            Subcategorias
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('payments') }}" class="nav-link @yield('payment')"><i
                                class="fas fa-money-bill-wave"></i>Configuración de pago</a>
                    </li>

                    @endrole

                    {{-- Si el usuario tiene el rol provider --}}
                    @role('provider')
                    <li class="nav-item @yield('dashboard')">
                        <a href="{{ route('provider') }}" class="nav-link @yield('dashboard')"><i
                                class="fas fa-cog"></i>Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('banner') }}" class="nav-link @yield('products')" data-toggle="collapse"
                            aria-expanded="false" data-target="#menu-products" aria-controls="menu-products"><i
                                class="fa fa-images"></i>Productos</a>
                        <div id="menu-products" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('provider.product.index') }}">
                                        Lista de tus productos
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('provider.products.create') }}">
                                        Publicar nuevo producto
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nax-item @yield('orders.provider')">
                        <a href="{{ route('provider.orders.index') }}" class="nav-link @yield('orders')">
                            <i class="fa fa-file-invoice-dollar"></i>
                            Ordenes de Ventas
                        </a>
                    </li>
                    <li class="nav-item @yield('questions')">
                        <a href="{{ route('questions') }}" class="nav-link @yield('questions')"><i
                                class="fas fa-question"></i>Preguntas</a>
                    </li>
                    @if (!Auth::user()->shop->verified())
                    <li class="nav-item ">
                        <a href="{{ route('shop.after', Auth::user()->shop->id) }}" class="nav-link "><i
                                class="fas fa-money-bill-wave"></i>Configuración de pago</a>
                    </li>
                    @endif
                    @endrole

                    {{-- Si el usuario solamente tiene el role client y no tiene el provider--}}
                    @if(Auth::user()->hasRole('client') && !Auth::user()->hasRole('provider'))
                    <li class="nax-item @yield('dashboard_client')">
                        <a href="{{ route('dashboard.client') }}" class="nav-link @yield('dashboard_client')">
                            <i class="fas fa-cog"></i>
                            Dashboard
                        </a>
                    </li>
                     {{--<li class="nax-item @yield('shop')">
                        <a href="{{ route('shops.create') }}" class="nav-link @yield('shop')">
                            <i class="fas fa-store"></i>
                            Registra tu tienda
                        </a>
                    </li>--}}
                    @endif
                    
                    @role('client')
                    <li class="nax-item @yield('orders.client')">
                        <a href="{{ route('client.orders.index') }}" class="nav-link @yield('orders')">
                            <i class="fa fa-file-invoice-dollar"></i>
                            Ordenes de compras
                        </a>
                    </li>
                    @endrole

                    <li class="nax-item @yield('messenger')">
                        <a href="{{ route('messages.index') }}" class="nav-link @yield('messenger')"><i
                                class="fas fa-envelope"></i>Mensajes</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('configuration.index') }}" class="nav-link @yield('configuration')"><i
                                class="fas fa-cog"></i>Configuración</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- ============================================================== -->
<!-- end left sidebar -->
<!-- ============================================================== -->
