<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="index, follow">
    <meta name="google" content="nositelinkssearchbox">
    <meta name="author" content="">
    <meta name="subjetc" content="">
    <meta name="Language" content="">
    <meta name="revisit-after" content="">
    <meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/stylesdashboard.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/all.min.css') }}" />
	

    <title></title>
</head>
<body>
	<div class="container-fluid">
		<div class="row contenedor-ppal">
			<aside class="col menu-opciones">
				<div class="logo-aside mt-2 mb-4 d-flex justify-content-center">
					<img src="{{ asset('img/logo MISHOPP-02') }}" alt="Logo Mishopp">
				</div>
				<ul>
					<li>
                        <a href="{{ route('clients') }}"><i class="fas fa-users"></i>Clientes</a>
                    </li>
					<li>
                        <a href="{{ route('providers') }}"><i class="fas fa-truck"></i>Provedores</a>
                    </li>
					<li>
                        <a href="{{ route('products') }}"><i class="fas fa-home"></i>Productos</a>
                    </li>
					<li>
                        <a href="{{ route('orders') }}"><i class="fas fa-home"></i>Ordenes</a>
                    </li>
                    <li>
                        <a href=""><i class="fas fa-home"></i>Opcion 1</a>
                    </li>
                    {{-- Copiar para agregar un nuevo item al menú --}}
				</ul>
			</aside>
			<nav class="nav-container d-flex align-items-center">

				<div class="opciones-usuario col-12 d-flex justify-content-end align-items-center">
					<div class="mensajes-usuario mr-4">
						<a href=""><i class="far fa-envelope"></i></a>
					</div>
					<div class="dropdown-usuario mt-1 d-flex ">
						<div class="imagen-usuario mr-1">
							<img src="{{ asset('img/img.jpg') }}" alt="Imagen de usuario" />
						</div>
						<p>Monica Galindo</p>
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
	 <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
</body>
</html>