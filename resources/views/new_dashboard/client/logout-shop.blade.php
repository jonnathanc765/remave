@extends('new_dashboard.layouts.app')

@section('title')
Registra tu Tienda
@endsection



@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
        <iframe src="https://www.mercadolibre.com/jms/mla/lgz/logout?platform_id=mp&go=" height="300" width="300"></iframe>
        </div>
    </div>
</div>
    @section('scripts')
        <script language="JavaScript">
            $(document).ready(function() {
                
                     setTimeout(cerrar,5000); //5000 = 5 segundos.
                     function cerrar() { 
                        window.open('','_parent',''); 
                        window.close(); 
                    } 
            });
        </script>
    @endsection 
@endsection