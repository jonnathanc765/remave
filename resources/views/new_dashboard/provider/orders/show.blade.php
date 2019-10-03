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
                        <div>Direccion: {{ $order->provider->address }}</div>
                        <div>Email: {{ $order->provider->email }}</div>
                         <div>Phone: {{ $order->provider->userDetail->phone }}</div>
                        
                    </div>
                    <div class="col-sm-6">
                        <h5 class="mb-3">A:</h5>
                        <h3 class="text-dark mb-1">{{ $order->user->name }}</h3>
                        <div>Estado: {{ $order->state->name }}</div>
                         <div>Ciudad: {{ $order->city->name }}</div>
                          <div>Municipio: {{  $order->zone->name }}</div> 
                        <div>Direccion: {{ $order->address }}</div>
                        <div>Email: {{ $order->user->email }}</div>
                     
                        <div>Nº de referencia: {{ $order->bank_reference }}</div>
                        <div>Banco: {{ $order->name_bank }}</div>
                        <div>Phone: {{ $order->user->userDetail->phone }}</div>
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
                                @if (!$order->shipped)
                                <td colspan="5" class="text-right">
                                    <a onclick="event.preventDefault(); shippingNow()"
                                        class="btn btn-info text-white">
                                        Marcar como enviado
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
            </div--}}
        </div>

    </div>
</div>

@endsection

@section('scripts')

<script>
    function shippingNow() {
        Swal.fire({
                text: '¿Estas seguro de que ya enviaste el paquete?',
                type: 'question',
                showCancelButton: true,
                confirmButtonText: 'Si, ya lo envie',
                confirmButtonColor: "#28a745",
                cancelButtonText: 'No, aun no',
                cancelButtonColor: '#dc3545',
                showLoaderOnConfirm: true,
                preConfirm: (option) => {
                    return fetch('{{ route('provider.orders.shipped', $order) }}')
                        .then(response => {
                            console.log(response);
                            if (!response.ok) {
                                throw new Error('Esta orden ya fue marcada como enviada.')
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
                        text: 'Esta orden se marco como enviada',
                        type: 'success',
                    })
                }
            });
    }

</script>

@endsection
