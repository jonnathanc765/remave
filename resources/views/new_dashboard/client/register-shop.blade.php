@extends('new_dashboard.layouts.app')

@section('title')
Registra tu Tienda
@endsection

@section('shop')
active              
@endsection

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="section-block" id="basicform">
            <h3 class="section-title">¿Quieres vender en nuestro sitio web?</h3>
            <p>Ven y registra tu tienda fisica con nosotros y comienza a generar ingresos.</p>
        </div>
        <div class="card">
            <form method="POST" action="{{ route('shops.store') }}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h5>@yield('title')</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="col-form-label">Nombre</label>
                        <input id="name" name="name" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Descripcion</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="minimum_ammount" class="col-form-label">Monto minimo para comprar</label>
                        <input id="minimum_ammount" name="minimum_ammount" type="number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="zone_id">Zona</label>
                        <select id="zone_id" class="form-control" name="zone_id">
                            @foreach ($zones as $zone)
                                <option value="{{ $zone->id }}">{{ $zone->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-form-label">Direccion</label>
                        <input id="address" name="address" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-form-label">Telefono</label>
                        <input id="phone" name="phone" type="text" class="form-control">
                    </div>
                    <div id="app">

                    
                        <div class="row mt-5">
                            <div class="col-8 d-flex align-items-center mb-5">
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" id="logo" name="logo" @change="onLogoChange">
                                    <label class="custom-file-label" for="logo">Logo de la tienda</label>
                                    <small id="emailHelp" class="form-text text-muted">Ingrese el logo de su tienda para mejorar la visualizacion e identificacion de la mima</small>

                                </div>
                            </div>

                            <div class="col-4 img-uploading-shop" v-if="urlLogo">
                                <img  :src="urlLogo" />
                            </div>  

                            <div class="col-4 img-uploading-shop" v-if="urlBanner">
                                <img  :src="urlBanner" />
                            </div> 


                        </div>


                    </div>
                    <div class="pt-2">
                        <div class="border-top w-100 d-flex justify-content-end pt-3">
                            <button class="btn btn-primary" type="submit">Registrar Tienda</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@section('scripts')

<script src="{{ asset('js/vue.js') }}"></script>

<script>



    var vm = new Vue({
        el: '#app',
        data: {
            urlLogo: null,
            urlBanner: null,
        },
        methods: {
            onLogoChange(e) {
            
                const file = e.target.files[0];
            
                this.urlLogo = URL.createObjectURL(file);             
            
            },
            onBannerChange(e) {
      
                const file = e.target.files[0];
                this.urlBanner = URL.createObjectURL(file);             
                
                
            }

        }
    });




</script>


@endsection 