{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


@extends('frontend.layouts.app')

@section('title')
Registro
@endsection

@section('content')
<section class="login_box_area section-margin">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="login_box_img">
                    <div class="hover">
                        <h4 class="text-danger">Debes verificar tu correo</h4>
                        <p>Actualmente tu correo <strong>{{ Auth::user()->email }}</strong> no se encuentra verificado, una vez que lo hagas, podras acceder a nuestra página</p>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection