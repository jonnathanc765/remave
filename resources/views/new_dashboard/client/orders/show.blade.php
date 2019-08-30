@extends('new_dashboard.layouts.app')

@section('title', 'Orden #'.$order->code)

@section('content')
<div class="row">
    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header p-4">
                <div class="float-left">
                    <h3>Estado de la orden: </h3>
                    <span class="badge-dot 
                        {{ $order->status == 'successful' ? 'badge-success' : '' }} 
                        {{ $order->status == 'failed' ? 'badge-danger' : '' }} 
                        {{ $order->status == 'pending' ? 'badge-info' : '' }}
                        {{ $order->status == 'paid' ? 'badge-info' : '' }} mr-1">
                        
                    </span>
                    @if ($order->shipped && $order->status != 'successful')
                    Paquete enviado
                    @else
                    {{ $order->status == 'successful' ? 'Completado' : '' }}
                    {{ $order->status == 'failed' ? 'Fallido' : '' }}
                    {{ $order->status == 'pending' ? 'Pendiente' : '' }}
                    {{ $order->status == 'paid' ? 'Pagado' : '' }}
                    @endif
                </div>

                <div class="float-right">
                    <h3 class="mb-0">@yield('title')</h3>
                    Fecha: {{ $order->created_at->format('d-m-Y') }}
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h5 class="mb-3">De:</h5>
                        <h3 class="text-dark mb-1">{{ $order->provider->name }}</h3>
                        <div>Direccion: {{ $order->provider->userDetail->address }}</div>
                        <div>Email: {{ $order->provider->email }}</div>
                        <div>Phone: {{ $order->provider->userDetail->phone }}</div>
                    </div>
                    <div class="col-sm-6">
                        <h5 class="mb-3">A:</h5>
                        <h3 class="text-dark mb-1">{{ $order->user->name }}</h3>
                        <div>Direccion: {{ $order->user->userDetail->address }}</div>
                        <div>Email: {{ $order->user->email }}</div>
                        <div>Phones: {{ $order->user->userDetail->phone }}</div>
                    </div>
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="center">#</th>
                                <th>Producto</th>
                                <th class="right">Precio</th>
                                <th class="center">Cantidad</th>
                                <th class="right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderDetails as $orderDetail)
                            <tr>
                                <td class="center">{{ $loop->iteration }}</td>
                                <td class="left strong">{{ $orderDetail->product->name }}</td>
                                <td class="right">${{ $orderDetail->productPrice() }}</td>
                                <td class="center">{{ $orderDetail->quantity }}</td>
                                <td class="right">${{ $orderDetail->total }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="3"></td>
                                <td>
                                    <strong class="text-dark">Subtotal</strong>
                                </td>
                                <td colspan="3" class="right">${{ $order->total }}</td>
                            </tr>
                            <tr>
                                @if ($order->status == 'pending' && !$order->shipped)
                                <td colspan="5" class="text-right">
                                    <a onclick="event.preventDefault(); confirmCancel()"
                                        class="btn btn-danger text-white">Eliminar Orden
                                    </a>

                                    {{-- Si eligio mercado pago le saldra el boton de pagar --}}
                                    @if ($order->payment_type == 'Mercadopago')
                                    <a href="{{ route('payment.proceed', $order->code) }}">
                                        <button class="btn btn-primary" type="button">Pagar</button>
                                    </a>
                                    @endif
                                </td>
                                @endif
                                @if ($order->shipped && $order->status != 'successful')
                                <td colspan="5" class="text-right">
                                    <a onclick="event.preventDefault(); orderReceived()"
                                        class="btn btn-primary text-white">
                                        Marcar como recibido
                                    </a>
                                </td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            {{--<div class="card-footer bg-white">
                <p class="mb-0">Metodo de pago: {{ $order->payment_type }}</p>
            </div>--}}
        </div>

    </div>
</div>

@endsection

@section('scripts')

<script>
    function confirmCancel() {
        Swal.fire({
                title: '¿Esta Seguro que desea eliminar la orden?',
                text: 'Tus productos pasaran al carrito de compra para que generes una nueva orden',
                type: 'question',
                showCancelButton: true,
                confirmButtonText: '¡Si, continuar!',
                cancelButtonText: 'No, seguir aqui'
            })
            .then((result) => {
                if (result.value) {
                    window.location.replace("{{ route('client.order.cancel', $order) }}");
                    // For more information about handling dismissals please visit
                    // https://sweetalert2.github.io/#handling-dismissals
                }
            });
    }

    function orderReceived() {
        Swal.fire({
                text: '¿Estas seguro de que ya recibiste el paquete?',
                type: 'question',
                showCancelButton: true,
                confirmButtonText: 'Si, ya lo recibi',
                confirmButtonColor: "#28a745",
                cancelButtonText: 'No, aun no',
                cancelButtonColor: '#dc3545',
                showLoaderOnConfirm: true,
                preConfirm: (option) => {
                    return fetch('{{ route('client.orders.received', $order) }}')
                        .then(response => {
                            console.log(response);
                            if (!response.ok) {
                                throw new Error('Esta orden ya fue marcada como recibida.')
                            }
                            return response.json()
                        })
                        .catch(error => {
                            Swal.showValidationMessage(
                                `${error}`
                            )
                        })
                },
                allowOutsideClick: () => !Swal.isLoading()
            })
            .then((result) => {
                if (result.value) {
                    Swal.fire({
                        title: '¡Muchas gracias!',
                        text: 'Esta orden se marco como completada y los puntos se han sumado a su usuario.',
                        type: 'success',
                    })
                }
            });
    }

</script>

@endsection
