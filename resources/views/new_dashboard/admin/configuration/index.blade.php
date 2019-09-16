@extends('new_dashboard.layouts.app')

@section('configuration')
active
@endsection

@section('title')
Configuracion General
@endsection

@section('content')

<div class="col-md-12 mb-5">

    <style>
        .img-thumbnail{
            max-height: 110px;
            max-width: 110px;
            object-fit: contain;
        }
    </style>

    {{-- Configuracion SEO -- Acordion #1 --}}
    <div class="accrodion-regular" id="accordionExample">

        @role('superadmin')
        <div class="card bg-primary">
            {{-- Botón para expandir --}}
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link text-white" type="button" data-toggle="collapse"
                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <span class="fas fa-angle-down mr-3"></span>
                        <i class="fas fa-chart-line"></i> SEO de la página
                    </button>
                </h2>
            </div>

            {{-- Expasible --}}
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="text-center text-lg-left card-body">
                    <form action="{{ route('configuration.store.SEO') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <p>Titulo del sitio: <strong>{{ $data['meta-title'] }}</strong></p>
                            <input type="text" placeholder="Nuevo título" class="form-control" name="meta-title">
                        </div>
                        <div class="form-group">
                            <p>Descripcion breve del sitio: <strong>{{ $data['meta-subject'] }}</strong></p>
                            <input type="text" class="form-control" placeholder="Nueva descripcion" name="meta-subjetc">
                        </div>
                        <div class="form-group">
                            <p>Autor del sitio: <strong>{{ $data['meta-author'] }}</strong></p>
                            <input type="text" class="form-control" placeholder="Nuevo Autor" name="meta-author">
                        </div>
                        <div class="form-group">
                            <label class="text-white">Indexacion del sitio:
                                <strong>{{ $data['meta-robots']=='index, follow'? 'Activada': 'Desactivada' }}</strong></label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="index" name="meta-robots"
                                {{ $data['meta-robots']=='index, follow'? 'checked':'' }} value="index, follow">
                            <label class="custom-control-label text-white" for="index">Encender/Apagar indexado</label>
                        </div>
                        <button type="submit" class="btn btn-secondary float-right mb-3">Guardar Cambios</button>

                    </form>
                </div>
            </div>
        </div>



        {{-- Actualizar redes sociales --}}
        <div class="card bg-secondary ">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link text-white collapsed" type="button" data-toggle="collapse"
                        data-target="#collapseFour" aria-expanded="false" aria-controls="collapseTwo">
                        <span class="fas fa-angle-down mr-3"></span>
                        <i class="fab fa-google-plus-g"></i> Actualizar Redes Sociales
                    </button>
                </h2>
            </div>
            {{-- Expansible para actualizar redes sociales --}}
            <div id="collapseFour" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="text-center text-lg-left card-body">

                    <form action="{{ route('social.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <p>Facebook</p>
                            <input type="text" placeholder="Nuevo link" class="form-control" name="Facebook"
                                value="{{$data['Facebook']}}">
                        </div>
                        <div class="form-group">
                            <p>Instagram</p>
                            <input type="text" class="form-control" placeholder="Nuevo link" name="Instagram"
                                value="{{ $data['Instagram'] }}">
                        </div>
                        <div class="form-group">
                            <p>Google+</p>
                            <input type="text" class="form-control" placeholder="Nuevo link" name="Google+"
                                value="{{ $data['Google+'] }}">
                        </div>
                        <div class="form-group">
                            <p>LinkedIn</p>
                            <input type="text" class="form-control" placeholder="Nuevo link" name="LinkedIn"
                                value="{{ $data['LinkedIn'] }}">
                        </div>
                        <div class="form-group">
                            <p>Twitter</p>
                            <input type="text" class="form-control" placeholder="Nuevo link" name="Twitter"
                                value="{{ $data['Twitter'] }}">
                        </div>
                        <div class="form-group">
                            <p>Pinterest</p>
                            <input type="text" class="form-control" placeholder="Nuevo link" name="Pinterest"
                                value="{{ $data['Pinterest'] }}">
                        </div>
                        <button class="btn btn-primary" type="submit">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Editar informacion de contacto --}}
        <div class="card bg-success">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                        data-target="#collapseFive" aria-expanded="false" aria-controls="collapseTwo">
                        <span class="fas fa-angle-down mr-3"></span>
                        <i class="fas fa-comment-dots"></i> Informacion de Contacto
                    </button>
                </h2>
            </div>
            {{-- Expansible para editar la informacion de contacto --}}
            <div id="collapseFive" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <form action="{{ route('contac.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <p class="text-white">Telefono</p>
                            <input type="text" placeholder="Nuevo link" class="form-control" name="Telefono"
                                value="{{$data['Telefono']}}">
                        </div>
                        <div class="form-group">
                            <p class="text-white">Email</p>
                            <input type="text" class="form-control" placeholder="Nuevo link" name="Email"
                                value="{{ $data['Email'] }}">
                        </div>
                        <div class="form-group">
                            <p class="text-white">Direccion</p>
                            <input type="text" class="form-control" placeholder="Nuevo link" name="Direccion"
                                value="{{ $data['Direccion'] }}">
                        </div>
                        <button class="btn btn-primary" type="submit">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>


        {{-- Expansible para modificar datos del letroro del home --}}
        <div class="card bg-info">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                        data-target="#information" aria-expanded="false" aria-controls="information">
                        <span class="fas fa-angle-down mr-3"></span>
                        <i class="fas fa-key"></i> Informacion para el Home
                    </button>
                </h2>
            </div>

            <div id="information" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="text-center text-lg-left card-body">
                    <form action="{{ route('information.update') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>
                                Informacion a mostrar en la pagina principal
                            </label>
                            <input class="form-control" id="information" name="information" type="text"
                            @if ($data['information'])
                                value="{{ $data['information'] }}"
                            @endif>
                        </div>
                        <p>Nota: Si deja el formulario en blanco, el letrero de informacion no se mostrará</p>

                        <button type="submit" class="btn btn-secundary float-right mb-3">Actualizar Datos</button>
                    </form>

                </div>
            </div>
        </div>

        {{-- Expansible para modificar del nosotros --}}
        <div class="card bg-warning">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                        data-target="#mission" aria-expanded="false" aria-controls="mission">
                        <span class="fas fa-angle-down mr-3"></span>
                        <i class="fas fa-key"></i> Modificar Informacion del Nosotros
                    </button>
                </h2>
            </div>

            <div id="mission" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="text-center text-lg-left card-body">
                    <form action="{{ route('mission.update') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>
                                Informacion que se muestra en el pie de pagina "Nosotros"
                            </label>
                            <input class="form-control" id="information" name="mission" type="text"
                            @if ($data['mission'])
                                value="{{ $data['mission'] }}"
                            @endif>
                        </div>
                        <p>Nota: Si deja el formulario en blanco, el letrero de "Nosotros" no se mostrará</p>

                        <button type="submit" class="btn btn-secundary float-right mb-3">Actualizar Datos</button>
                    </form>

                </div>
            </div>
        </div>

        @endrole

      
        {{-- Acordion para actualizar datos --}}
        <div class="card bg-info">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link  collapsed" type="button" data-toggle="collapse"
                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <span class="fas fa-angle-down mr-3"></span>
                        <i class="far fa-id-card"></i> Actualizar Datos
                    </button>
                </h2>
            </div>
            {{-- Expansible de actualizar datos --}}
            <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="text-center text-lg-left card-body">

                    <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        <h3 class="text-center">Avatar</h3>
                        @if (Auth::user()->avatar == "")
                            <h3 class="text-center">Actualmente no posees Avatar</h3>
                        @else
                            <div class="text-center mt-3 mb-3">
                                <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="" class="img-thumbnail">
                            </div>
                        @endif
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="avatar" name="avatar" lang="es">
                            <label class="custom-file-label" for="customFile">Cambiar Avatar</label>
                        </div>
                        @csrf
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input id="name{{ $user->id }}" name="name" class="form-control" placeholder="Nombre"
                                type="text" autocomplete="off" value="{{ $user->name }}">
                        </div>

                        <div class="form-group">
                            <label for="">DNI</label>
                            <input id="dni{{ $user->id }}" name="dni" class="form-control" type="text"
                                autocomplete="off" value="{{ $user->dni }}">
                        </div>
                        <div class="form-group">
                            <label for="">Correo Electronico</label>
                            <input id="email{{ $user->id }}" name="email" class="form-control" type="text"
                                autocomplete="off" value="{{ $user->email }}">
                        </div>
                        <button type="submit" class="btn btn-primary float-right mb-3">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
        {{-- Expansible para actualizar contraseña --}}
        <div class="card bg-warning">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                        data-target="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">
                        <span class="fas fa-angle-down mr-3"></span>
                        <i class="fas fa-key"></i> Actualizar Contaseña
                    </button>
                </h2>
            </div>

            <div id="collapseThree" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="text-center text-lg-left card-body">
                    <form action="{{ route('user.password.update', $user->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>
                                Contraseña Actual
                            </label>
                            <input autocomplete="off" class="form-control" id="acpassword" name="acpassword"
                                type="password">
                        </div>

                        <div class="form-group">
                            <label>
                                Nueva Contraseña
                            </label>
                            <input autocomplete="off" class="form-control" id="password" name="password"
                                type="password">
                        </div>

                        <div class="form-group">
                            <label>
                                Confirmación Contraseña
                            </label>
                            <input autocomplete="off" class="form-control" id="cfmPassword" name="cfmPassword"
                                type="password">
                        </div>
                        <button type="submit" class="btn btn-secundary float-right mb-3">Actualizar
                            Contraseña</button>
                    </form>

                </div>
            </div>
        </div>

        {{-- Expansible para agregar datos de envio --}}
        <div class="card bg-success">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                        data-target="#detail_users" aria-expanded="false" aria-controls="collapseTwo">
                        <span class="fas fa-angle-down mr-3"></span>
                        <i class="fas fa-key"></i> Informacion personal extra (Requerida para envios en las compras)
                    </button>
                </h2>
            </div>

            <div id="detail_users" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="text-center text-lg-left card-body">
                    <form action="{{ route('user-details.update') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>
                                Telefono de contacto
                            </label>
                            <input class="form-control" id="phone" name="phone" type="number"
                            @if ($user->userDetail)
                                value="{{ $user->userDetail->phone }}"
                            @endif>
                        </div>
                        <div class="form-group">
                            <label for="state_id">Estado</label>
                            <select name="state_id" id="state_id" class="form-control">
                                @if ($user->userDetail)
                                <option disabled {{ $user->userDetail->state_id ? '' : 'selected' }}>Seleccione...</option>
                                @endif
                                @foreach ($states as $state)
                                <option {{ $user->userDetail->state_id == $state->id ? 'selected' : '' }} value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="city_id">Ciudad</label>
                            <select name="city_id" id="city_id" class="form-control">
                                <option disabled {{ $user->userDetail->city_id ? '' : 'selected' }}>Seleccione...</option>
                                @foreach ($cities as $city)
                                <option {{ $user->userDetail->city_id == $city->id ? 'selected' : '' }} value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="zone_id">Municipio</label>
                            <select name="zone_id" id="zone_id" class="form-control">
                                <option disabled {{ $user->userDetail->zone_id ? '' : 'selected' }}>Seleccione...</option>
                                @foreach ($zones as $zone)
                                <option {{ $user->userDetail->zone_id == $zone->id ? 'selected' : '' }} value="{{ $zone->id }}">{{ $zone->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>
                                Codigo Postal
                            </label>
                            <input class="form-control" id="zip_code" name="zip_code" type="text"
                            @if ($user->userDetail)
                                value="{{ $user->userDetail->zip_code }}"
                            @endif>
                        </div>

                        <div class="form-group">
                            <label>
                                Calle
                            </label>
                            <input class="form-control" id="street" name="street" type="text"
                            @if ($user->userDetail)
                                value="{{ $user->userDetail->street }}"
                            @endif>
                        </div>

                        <div class="form-group">
                            <label>
                                Direccion
                            </label>
                            <input class="form-control" id="address" name="address" type="text"
                            @if ($user->userDetail)
                                value="{{ $user->userDetail->address }}"
                            @endif>
                        </div>

                        <button type="submit" class="btn btn-secundary float-right mb-3">Actualizar Datos</button>
                    </form>

                </div>
            </div>
        </div>



        


    </div>
</div>

@endsection
