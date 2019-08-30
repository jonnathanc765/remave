@extends('dashboard.layouts.app')

@section('info')
active
@endsection

@section('content')
<div class="card">
    <div class="p-5">
        <div class="form-header text-center">
            <h3>¿Te gustaria ser provedor?</h3>
            <p>Llena este formulario y podrás publicar artículos en nuestro sitio web</p>
        </div>
        <form method="POST" action="{{ route('shop.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Nombre de la tienda</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Shoppyfystacia" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Monto minimo</label>
                    <input type="text" class="form-control" id="inputPassword4" placeholder="1300000" aria-describedby="montoMinimo" name="minimum_ammount" value="{{ old('minimum_ammount') }}">
                    <small id="montoMinimo" class="form-text text-muted">
                        El monto minimo indicará a los clientes cual sera la cantidad de dinero que debera gastar como
                        monimo para poder comprar en su tienda.
                    </small>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputAddress">Direccion de la tienda</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address" value="{{ old('address') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputAddress2">Telefono</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="+584169856239" name="phone" value="{{ old('phone') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="logo">Logo de su tienda</label>
                <input type="file" class="form-control-file" id="logo" name="logo">
            </div>
            <button type="submit" class="btn btn-primary mx-auto">Registrar Tienda</button>
        </form>
    </div>
</div>
@endsection
