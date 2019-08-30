

<!DOCTYPE html>
<html>
<head>

    <div>
        <a  align="left" class="navbar-brand logo_h"><img src="{{ asset('img/logito.png') }}"
            class="img-fluid" alt="" style="max-width: 60px"></a>
            <p align="center">AUTOPARTES REMAVECA<br> Accesorios para Vehiculos , Partes Electricas, Empacaduras,<br>
                Correas, Tornillos, Partes de Frenos, Rodamientos,<br>
                Articulos de Ferreteria.<br>
                Av. Principal Local No. S/N, Barrios El Tostao, Barquisimeto Lara<br>
            Zona Postal 3001 Teléfono : 0251-4151975</p>
            <p align="right">RIF : J-40049086-3</p>
        </div>
    </head>
    <body>
        <h3 class="billing-title">Informacion de la Orden</h3>

        <table class="order-rable">
            <tr>
                <td>Codigo de Orden</td>
                <td>: {{ $order->code }}</td>
            </tr>
            <tr>
                <td>Fecha</td>
                <td>: {{ $order->created_at->format('M d, Y') }}</td>
            </tr>
            <tr>
                <td>Total</td>
                <td>: $ {{ $order->total }}</td>
            </tr>
                       {{--}} <tr>
                            <td>Metodo de pago</td>
                            <td>: {{ $order->payment_type }}</td>
                        </tr>--}}
                        <tr>
                            <td>Nº referencia bancaria</td>
                            <td>: {{ $order->bank_reference }}</td>
                        </tr>
                        <tr>
                            <td>Banco al cual se transfirio</td>
                            <td>: {{ $order->name_bank }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            {{--<div class="col-md-4 col-xl-4 mb-4 mb-xl-0">
                <div class="confirmation-card">
                    <h3 class="billing-title">Dirección de envio</h3>
                    <table class="order-rable">
                        <tr>
                            <td>Calle</td>
                            <td>: 
                                @if ($order->provider->userDetail->street)
                                    {{ $order->provider->userDetail->street }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Estado</td>
                            <td>: 
                                @if ($order->provider->userDetail->state)
                                    {{ $order->provider->userDetail->state->name }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Ciudad</td>
                            <td>: 
                                @if ($order->provider->userDetail->city)
                                    {{ $order->provider->userDetail->city->name }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Municipio</td>
                            <td>: 
                                @if ($order->provider->userDetail->zone)
                                    {{ $order->provider->userDetail->zone->name }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Codigo Postal</td>
                            <td>: 
                                @if ($order->provider->userDetail->zip_code)
                                    {{ $order->provider->userDetail->zip_code }}
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>--}}
            <div class="col-md-4 col-xl-4 mb-4 mb-xl-0">
                <div class="confirmation-card">
                    <h3 class="billing-title">Dirección de llegada</h3>
                    <table class="order-rable">
                        <tr>
                            <td>Calle</td>
                            <td>: {{ $order->street }}</td>
                        </tr>
                        <tr>
                            <td>Estado</td>
                            <td>: {{ $order->state->name }}</td>
                        </tr>
                        <tr>
                            <td>Ciudad</td>
                            <td>: {{ $order->city->name }}</td>
                        </tr>
                        <tr>
                            <td>Zona</td>
                            <td>: {{ $order->zone->name }}</td>
                        </tr>
                        <tr>
                            <td>Codigo Postal</td>
                            <td>: {{ $order->zip_code }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="order_details_table">
            <h2>Detalles de la Orden</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Producto</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderDetails as $orderDetail)
                        <tr>
                            <td>
                                <p>{{ $orderDetail->product->name }}</p>
                            </td>
                            <td>
                                <h5>x {{ $orderDetail->quantity }}</h5>
                            </td>
                            <td>
                                <p>$ {{ $orderDetail->total }}</p>
                            </td> 
                        </tr>
                        @endforeach
                        <tr>
                            <td>
                                <h4>Total</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <h4>$ {{ $order->total }}</h4>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>



        

      {{--  <div class="d-flex justify-content-end mt-3">
            <a class="pr-3" href="{{ route('messages.show', $thread->id) }}"><button class="btn btn-primary button" type="button">Contactar con el vendedor</button></a>
            @if ($order->payment_type == 'MERCADOPAGO')
            <a href="{{ route('payment.proceed', $order->code) }}"><button class="btn btn-primary button" type="button">Pagar</button></a>
            @endif
        </div>--}}
    </div>
</section>
</body>
</html>
<!--================Order Details Area =================-->

<!--================End Order Details Area =================-->
