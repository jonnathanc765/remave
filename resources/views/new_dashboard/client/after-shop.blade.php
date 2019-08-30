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
                    <h2>Afiliacion mercado Pago</h2>

                        <p>Se debe afiliar a mercado para formalizar el registro como proveedor</p>
                        <div class="form-group">
                            <label for="client_secret" class="col-form-label">vinculate a Mercadopago</label>
                            <div class="w-100 d-flex justify-content-start">
                            <a class="btn btn-primary text-white" onclick="javascript:ventanaN('{{ route('authorization') }}')">vinculación</a>
                            @section('scripts')
                            <script language=javascript>
                                    function ventanaN(url){
                                    window.open(url, "Viculacion", "width=500, height=400")
                                    }
                            </script>
                            @endsection
                            </div>
                        </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
