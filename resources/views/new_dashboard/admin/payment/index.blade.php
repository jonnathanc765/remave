@extends('new_dashboard.layouts.app')

@section('payment')
    active
@endsection

@section('title')
Adminsitracion de pagos
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card bg-info">
            
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link  collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <span class="fas fa-angle-down mr-3"></span>
                        <i class="far fa-id-card"></i> Adminsitración de pago 
                    </button> 
                </h5>
            </div>
            {{-- Expansible de actualizar datos --}}
            <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="text-center text-lg-left card-body">

                    <form action="{{ route('saveToken') }}"  method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">APP ID</label>
                            <p>App_ID Actual: {{ $app_id }}</p>
                            <input id="Client_id" name="app_id" class="form-control" placeholder="Client id" type="text" autocomplete="off" value="">
                        </div>

                        <div class="form-group">
                            <label for="">Secret Key</label>
                            <input id="SECRET_KEY" name="secret_token" class="form-control"  type="text" placeholder="Secret Key" autocomplete="off" value="">
                        </div>
                        <button type="submit" class="btn btn-primary float-right mb-3">Actualizar</button>
                    </form>
                </div>
            </div>   
            
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link  collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <span class="fas fa-angle-down mr-3"></span>
                            <i class="far fa-id-card"></i> Comision
                        </button> 
                    </h5>
                </div>
                {{-- Expansible de actualizar datos --}}
                <div id="collapseThree" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="text-center text-lg-left card-body">
                    
                        <form action="{{ route('payment.store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group col-md-6">
                                <p>Comision Actual: <strong>{{ $comision*10 }}%</strong></p>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="value">Cambiar Comision</label>
                                <textarea class="form-control" id="value" name="value" rows="1">{{ old('value') }}</textarea>
                            </div>
                            <div class="form-group ml-3">
                                <button class="btn btn-primary" type="submit">Actualizar</button>
                            </div>
                        </form>

                    </div>
                </div>   
        </div>
        <h3>Indicaciones para obtener credeciales</h3>
                <ul>
                    <li><p>ingresar  <a href="" onclick ="javascript:ventanaN('https://applications.mercadopago.com.ar/list?platform=mp')">Aqui</a></p></li>
                    <li><p>Proceda a registrar sitio web en su cuenta mercadopago.</p></li>
                    <li><p>Copia y pega, en el campo Redirect URI este url:  {{ route('credencial_provider') }}</p></li>
                    <li><p>Despues de guardar obtienes el APP ID y SECRET ID</p></li>
                </ul>
    </div>


    @endsection


 
    
    
@section('scripts')
    <script language=javascript>
        function ventanaN(url){
            window.open(url, "Viculacion", "width=700, height=700")
        }
    </script>
@endsection