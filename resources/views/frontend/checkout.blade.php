@extends('frontend.layouts.app')

@section('title')
Confirmacion de la Orden
@endsection

@section('confirmation')
active
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('vendors/linericon/style.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/nouislider/nouislider.min.css') }}">
<style>
    .swal2-content .nice-select {
        display: none;
    }

</style>
@endsection

@section('content')

<!--================Checkout Area =================-->
<section class="checkout_area section-margin--small">
    <div class="container">

        <div class="billing_details">
            <form class="contact_form" action="{{ route('orders.store') }}" method="POST" id="orders.store">
                <div class="row">
                    @method('POST')
                    @csrf
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-6">
                                <h3>Detalles de facturación</h3>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <div class="btn-group-toggle btn-disabled" data-toggle="buttons">
                                    <label class="btn btn-primary">
                                        <input type="checkbox"> Editar Informacion
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="state_id">Estado</label>
                                <select id="state_id" name="state_id" class="form-control wide" disabled>
                                    @foreach ($states as $state)
                                    <option {{ (Auth::user()->userDetail->state_id == $state->id) ? 'selected' : '' }}
                                        value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="city_id">Ciudad</label>
                                    <select id="city_id" name="city_id" class="form-control wide" disabled>
                                       @foreach ($cities as $city)
                                       <option {{ (Auth::user()->userDetail->city_id == $city->id) ? 'selected' : '' }}
                                        value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach--}}
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="zone_id">Municipio</label>
                                    <select id="zone_id" name="zone_id" class="form-control wide" disabled>
                                       {{-- @foreach ($zones as $zone)
                                        <option {{ (Auth::user()->userDetail->zone_id == $zone->id) ? 'selected' : '' }}
                                            value="{{ $zone->id }}">{{ $zone->name }}</option>
                                            @endforeach--}}
                                              @foreach ($zones as $zone)
                                <option {{ $user->userDetail->zone_id == $zone->id ? 'selected' : '' }} value="{{ $zone->id }}">{{ $zone->name }}</option>
                                @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="zip_code">Codigo Postal</label>
                                        <input type="text" class="form-control" id="zip_code" readonly name="zip_code" @if(Auth::user()->userDetail->zip_code)
                                        value="{{ Auth::user()->userDetail->zip_code }}"
                                        @endif>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <label for="street">Calle</label>
                                        <input type="text" class="form-control" id="street" name="street" readonly @if(Auth::user()->userDetail->street)
                                        value="{{ Auth::user()->userDetail->street }}"
                                        @endif>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="address">Dirección</label>
                                        <input type="text" class="form-control" id="address" name="address" readonly @if(Auth::user()->userDetail->address)
                                        value="{{ Auth::user()->userDetail->address }}"
                                        @endif>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="bank_reference">Nº referencia</label>
                                        <input type="text" class="form-control" id="bank_reference" readonly name="bank_reference" @if(Auth::user()->userDetail->bank_reference)
                                        value="{{ Auth::user()->userDetail->bank_reference }}"
                                        @endif>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <label for="name_bank">Nombre del Banco al que Transfirio</label>
                                        <input type="text" class="form-control" id="name_bank" name="name_bank" readonly @if(Auth::user()->userDetail->name_bank)
                                        value="{{ Auth::user()->userDetail->name_bank }}"
                                        @endif>
                                    </div>
                                    <div class="col-6">
                                        <h3>Datos Bancarios</h3>
                                    </div> 
                                </div>
                                

                            </div>
                            <div class="col-lg-4">
                                <div class="order_box">
                                    <h2>Su Orden</h2>
                                    <ul class="list">
                                        <li><a href="#">
                                            <h4>Producto <span> Precio por producto </span>
                                            </a></li>
                                            @foreach ($cartItems as $item)
                                            <li>
                                                <a href="{{ route('single-product', $item->model->code) }}">
                                                    <span class="text-truncate float-left" style="max-width: 150px">{{ $item->model->name }}</span>
                                                    <span class="middle">x {{ $item->qty }}</span>
                                                    <span class="last">$ {{ $item->price}} </span>
                                                </a>
                                            </li>
                                            
                                            @endforeach
                                        </ul>
                        
                                <div class="payment_item">
                                    <div class="radion_btn">
                                        <input type="radio" id="f-option5" name="payment_type" value="vendedor">
                                        <label for="f-option5">clik aqui para generar orden</label>
                                        <div class="check"></div>
                                        <h2 class="text-center">Cuentas Bancarias</h2>
                                        <div class="payment_item">
                                            <div class="radion_btn">
                                                <input type="radio" id="f-option" name="payment_type" value="vendedor">
                                                <label for="f-option5">Banesco</label>
                                                
                                            </div>
                                            <p>Puede contactar con el vendedor y acordar su forma de pago directamente.</p>
                                        </div>
                                        <div class="payment_item">
                                            <div class="radion_btn">
                                                <input type="radio" id="f-option2" name="payment_type" value="vendedor">
                                                <label for="f-option5">Provincial</label>
                                                
                                            </div>
                                            <p>Puede contactar con el vendedor y acordar su forma de pago directamente.</p>
                                        </div>
                                        <div class="payment_item">
                                            <div class="radion_btn">
                                                <input type="radio" id="f-option5" name="payment_type" value="vendedor">
                                                <label for="f-option1">venezuela</label>
                                                
                                            </div>
                                            <p>Puede contactar con el vendedor y acordar su forma de pago directamente.</p>
                                        </div>
                                        <div class="text-center">
                                            <a class="button button-paypal" id="submit" href="#"
                                            onclick="event.preventDefault();">Generar Orden</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <!--================End Checkout Area =================-->

            @endsection

            @section('scripts')
            <script>
                var deshabilitados = $('.form-group input[readonly]');
                var select = $('.form-group select[disabled]');
                $('.btn-disabled').click(function () {

                    deshabilitados.each(function () {
                        $(this).removeAttr('readonly');
                    });

                    select.each(function () {
                        $(this).prop('disabled', false).niceSelect('update');
                    });
                })
                $('#submit').click(function () {

                    deshabilitados.each(function () {
                        $(this).removeAttr('readonly');
                    });

                    select.each(function () {
                        $(this).prop('disabled', false).niceSelect('update');
                    });

                    document.getElementById('orders.store').submit()
                })

            </script>
            @endsection
