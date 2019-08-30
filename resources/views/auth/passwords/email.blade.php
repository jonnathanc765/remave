@extends('frontend.layouts.app')

@section('title')
Reseteo de contraseña
@endsection

@section('content')

<section class="login_box_area section-margin">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <div class="hover">
                        <h4>Ya tienes una cuenta?</h4>
                        <p></p>
                        <a class="button button-account" href="{{ route('login') }}">Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner">
                    <h3>Reseteo de contraseña</h3>
                    <form method="POST" action="{{ route('password.email') }}">
                            @csrf
    
                            <div class="form-group row">
                                <div class="col-md-8 offset-md-2">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Correo Electronico" required autofocus>
    
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-2">
                                    <button type="submit" class="button button-login w-100">
                                        {{ __('Enviar Email') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
