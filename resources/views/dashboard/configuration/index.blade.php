@extends('dashboard.layouts.app')

@section('config')
active
@endsection

@section('title')
Configuración
@endsection

@section('content')

<link rel="stylesheet" href="{{ asset('css/estilos-configuraciones.css') }}">
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-3">
            <h2 class="text-center">Ajustes Generales</h2>
            @if (session('success'))
            <div class="container mt-4">
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            </div>
            @endif

            <div class="accordion" id="accordionExample">

                

                {{-- Prime acordion --}}
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                SEO de la página
                            </button>
                        </h2>
                    </div>
                    

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="text-center text-lg-left card-body">
                            <form action="{{ route('configuration.store.SEO') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <p>Titulo del sitio: <strong>{{ $data['meta-title'] }}</strong></p>
                                    <input type="text" placeholder="Nuevo título" class="form-control" name="meta-title">
                                </div>
                                <div class="form-group">
                                    <p>Descripcion breve del sitio:  <strong>{{ $data['meta-subjetc'] }}</strong></p>
                                    <input type="text" class="form-control" placeholder="Nueva descripcion" name="meta-subjetc">
                                </div>
                                <div class="form-group">
                                    <p>Autor del sitio: <strong>{{ $data['meta-author'] }}</strong></p>
                                    <input type="text" class="form-control" placeholder="Nuevo Autor" name="meta-author">
                                </div>
                                <div class="form-group">
                                    <label>Indexacion del sitio: <strong>{{ $data['meta-robots']=='index, follow'? 'Activada': 'Desactivada' }}</strong></label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1" name="meta-robots"
                                    {{ $data['meta-robots']=='index, follow'? 'checked':'' }}
                                    value="index, follow">
                                    <label class="custom-control-label" for="customCheck1">Encender/Apagar indexado</label>
                                </div>
                                <button type="submit" class="btn btn-success float-right mb-3">Guardar Cambios</button>
                                
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Fin Prime acordion --}}



                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-success collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseTwo">
                                Actualizar Redes Sociales
                            </button>
                        </h2>
                    </div>

                    <div id="collapseFour" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="text-center text-lg-left card-body">

                            <form action="{{ route('social.store') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">


                                    <div class="form-group">
                                        <p>Facebook</p>
                                        <input type="text" placeholder="Nuevo link" class="form-control" name="Facebook" value="{{$data['Facebook']}}">
                                    </div>
                                    <div class="form-group">
                                        <p>Instagram</p>
                                        <input type="text" class="form-control" placeholder="Nuevo link" name="Instagram" value="{{ $data['Instagram'] }}">
                                    </div>
                                    <div class="form-group">
                                        <p>Google+</p>
                                        <input type="text" class="form-control" placeholder="Nuevo link" name="Google+" value="{{ $data['Google+'] }}">
                                    </div>
                                    <div class="form-group">
                                        <p>LinkedIn</p>
                                        <input type="text" class="form-control" placeholder="Nuevo link" name="LinkedIn" value="{{ $data['LinkedIn'] }}">
                                    </div>
                                    <div class="form-group">
                                        <p>Twitter</p>
                                        <input type="text" class="form-control" placeholder="Nuevo link" name="Twitter" value="{{ $data['Twitter'] }}">
                                    </div>
                                    <div class="form-group">
                                        <p>Pinterest</p>
                                        <input type="text" class="form-control" placeholder="Nuevo link" name="Pinterest" value="{{ $data['Pinterest'] }}">
                                    </div>
                                </div>
                                    
                                <button class="btn btn-primary" type="submit">Actualizar</button>
                            </form>
                            
                        </div>
                    </div> 
                </div>
                

                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-success collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseTwo">
                                Informacion de Contacto
                            </button>
                        </h2>
                    </div>

                    <div id="collapseFive" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="text-center text-lg-left card-body">

                            <form action="{{ route('contac.store') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <div class="form-group">
                                        <p>Telefono</p>
                                        <input type="text" placeholder="Nuevo link" class="form-control" name="Telefono" value="{{$data['Telefono']}}">
                                    </div>
                                    <div class="form-group">
                                        <p>Email</p>
                                        <input type="text" class="form-control" placeholder="Nuevo link" name="Email" value="{{ $data['Email'] }}">
                                    </div>
                                    <div class="form-group">
                                        <p>Direccion</p>
                                        <input type="text" class="form-control" placeholder="Nuevo link" name="Direccion" value="{{ $data['Direccion'] }}">
                                    </div>
                                    
                                </div>
                                    
                                <button class="btn btn-primary" type="submit">Actualizar</button>
                            </form>   
                        </div>
                    </div>  
                </div>

                
                {{-- Segundo Acordion --}}

                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-warning collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Actualizar Datos
                            </button>
                        </h2>
                    </div>

                    <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="text-center text-lg-left card-body">
                            <form action="{{ route('user.update', $user->id) }}"  method="POST">
                                {!! csrf_field() !!}                                
                                <div class="form-group">
                                    <label for="">Nombre</label>
                                    <input id="name{{ $user->id }}" name="name" class="form-control" placeholder="Nombre" type="text" autocomplete="off" value="{{ $user->name }}">
                                </div>

                                <div class="form-group">
                                    <label for="">DNI</label>
                                    <input id="dni{{ $user->id }}" name="dni" class="form-control"  type="text" autocomplete="off" value="{{ $user->dni }}">
                                </div>
                                <div class="form-group">
                                <label for="">Correo Electronico</label>
                                <input id="email{{ $user->id }}" name="email" class="form-control" type="text" autocomplete="off" value="{{ $user->email }}">
                                </div>
                                <button type="submit" class="btn btn-success float-right mb-3">Actualizar</button>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- fin Segundo Acordion --}}
                

                {{-- Tercer acordion  --}}
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-success collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">
                                Actualizar Contaseña
                            </button>
                        </h2>
                    </div>

                    <div id="collapseThree" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="text-center text-lg-left card-body">

                            <form action="{{ route('password.update', $user->id) }}"  method="POST">
                                {!! csrf_field() !!} 
                                <div class="form-group">
                                    <label>
                                        Contraseña Actual
                                    </label>
                                    <input autocomplete="off" class="form-control" id="acpassword" name="acpassword"  type="password">
                                </div>
                                <div class="col-12 col-sm-4 text-center">
                                    <div class="form-group">
                                        <label>
                                            Nueva Contraseña
                                        </label>
                                        <input autocomplete="off" class="form-control" id="password" name="password"  type="password">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4 text-center">
                                    <div class="form-group">
                                        <label>
                                            Confirmación Contraseña
                                        </label>
                                        <input autocomplete="off" class="form-control" id="cfmPassword" name="cfmPassword" type="password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success float-right mb-3">Actualizar Contraseña</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

 @endsection