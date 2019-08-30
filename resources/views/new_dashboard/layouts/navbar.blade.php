<!-- ============================================================== -->
<!-- navbar -->
<!-- ============================================================== -->
<div class="dashboard-header">
    <nav class="navbar navbar-expand-lg bg-white fixed-top">
        <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('img/logito.png')}}" alt="Logo MiShop"
                height="50px">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right-top">
                <li class="nav-item dropdown connection">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"> <i class="fas fa-fw fa-th"></i> </a>
                    <ul class="dropdown-menu dropdown-menu-right connection-dropdown">
                        <li class="connection-list">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                    <a href="{{ route('home') }}" class="connection-item">
                                        <i class="fa fa-home"></i>
                                        <span>Inicio</span>
                                    </a>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                    <a href="{{ route('dashboard') }}" class="connection-item">
                                        <i class="fas fa-columns"></i>
                                        <span>Dashboard</span></a>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                    <a href="@role('superadmin') {{ route('orders.index') }} @endrole @role('client') {{ route('client.orders.index') }} @endrole"
                                        @role('organizer') {{ route('organizer.orders.index') }} @endrole
                                        class="connection-item">
                                        <i class="fa fa-file-invoice-dollar"></i>
                                        <span>Ordenes</span>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown nav-user">
                    <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><img src="
                        @if (Auth::user()->avatar == "")
                            {{ asset('img/avatar.jpg') }}
                        @else
                            {{ Storage::url(Auth::user()->avatar) }}
                        @endif
                        " alt="" class="user-avatar-md rounded-circle"></a>
                    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                        aria-labelledby="navbarDropdownMenuLink2">
                        <div class="nav-user-info">
                            <h5 class="mb-0 text-white nav-user-name">{{ Auth::user()->name }}</h5>
                            <span class="status"></span><span
                                class="ml-2">{{ ucwords(Auth::user()->getRoleNames()->first()) }}</span>
                        </div>
                        @role('superadmin')

                        <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Cuenta</a>
                        @endrole
                        @role('provider')
                        <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Cuenta</a>
                        @endrole
                        @role('client')
                        <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Cuenta</a>
                        @endrole
                        <a class="dropdown-item" href="{{ route('configuration.index') }}"><i
                                class="fas fa-cog mr-2"></i>Configuracion</a>
                        <a class="dropdown-item" href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                class="fas fa-power-off mr-2"></i>Salir</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
<!-- ============================================================== -->
<!-- end navbar -->
<!-- ============================================================== -->
