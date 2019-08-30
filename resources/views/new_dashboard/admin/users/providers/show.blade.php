@extends('new_dashboard.layouts.app')

@section('providers')
active
@endsection

@section('title')
Lista de todos los provedores.
@endsection

@section('content')




<!-- ============================================================== -->
<!-- content -->
<!-- ============================================================== -->
<div class="row">
    <!-- ============================================================== -->
    <!-- profile -->
    <!-- ============================================================== -->
    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12">
        <!-- ============================================================== -->
        <!-- card profile -->
        <!-- ============================================================== -->
        {{-- {{ dd($user) }} --}}
        <div class="card">
            <div class="card-body">
                <div class="user-avatar text-center d-block">
                    <img src="{{ Storage::url($user->avatar) }}" alt="User Avatar"
                        class="rounded-circle user-avatar-xxl">
                </div>
                <div class="text-center">
                    <h2 class="font-24 mb-0">{{ $user->name }}</h2>
                    <p>Proveedor</p>
                </div>
            </div>
                <div class="card-body border-top">
                    <h3 class="font-16">Información de Contacto</h3>
                    <div class="">
                        <ul class="list-unstyled mb-0">
                        <li class="mb-2"><i class="fas fa-fw fa-envelope mr-2"></i>{{ $user->email }}</li>
                        <li class="mb-0"><i class="fas fa-fw fa-phone mr-2"></i>{{ $user->phone }}</li>
                    </ul>
                </div>
            </div>
                <div class="card-body border-top">
                    <h3 class="font-16">Valoración</h3>
                    <h1 class="mb-0"></h1>
                    <div class="rating-star">
                    @for ($i = 0; $i < 5; $i++)
                        <i class="fa fa-fw fa-star"></i>
                    @endfor
                        <p class="d-inline-block text-dark">{{ $data->soldProducts }} Reseñas </p>
                    </div>
                </div>
            </div>
            <div class="card-body border-top">
                <h3 class="font-16">Categorias Registradas</h3>
                <div>
                    <a href="#" class="badge badge-light mr-1">Fitness</a>
                    <a href="#" class="badge badge-light mr-1">Life Style</a><a href="#"
                        class="badge badge-light mr-1">Gym</a>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end card profile -->
        <!-- ============================================================== -->
        <div class="col-xl-9 col-lg-9 col-md-7 col-sm-12 col-12">
        <!-- ============================================================== -->
        <!-- campaign tab one -->
        <!-- ============================================================== -->
        <div class="influence-profile-content pills-regular">
            <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-campaign-tab" data-toggle="pill" href="#pills-campaign"
                        role="tab" aria-controls="pills-campaign" aria-selected="true">Resumen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-packages-tab" data-toggle="pill" href="#pills-packages" role="tab"
                        aria-controls="pills-packages" aria-selected="false">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab"
                        aria-controls="pills-review" aria-selected="false">Valoraciones</a>
                </li>
                <!-- <li class="nav-item">
                        <a class="nav-link" id="pills-msg-tab" data-toggle="pill" href="#pills-msg" role="tab" aria-controls="pills-msg" aria-selected="false">Contactar</a>
                    </li> -->
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-campaign" role="tabpanel"
                    aria-labelledby="pills-campaign-tab">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="section-block">
                                <h3 class="section-title">Datos Relevantes</h3>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="mb-1">{{ $data->soldProducts }}</h1>
                                    <p>Productos Vendidos</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="mb-1">{{ $data->registeredProduts }}</h1>
                                    <p>Productos Registrados</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="mb-1">{{ $data->deletedProducts }}</h1>
                                    <p>Productos Eliminados</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="mb-1">{{ $data->soldProducts }}</h1>
                                    <p>Ordenes con sus productos</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-block">
                        <h3 class="section-title">Ordenes de este proveedor</h3>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="awd" class="table table-striped second text-center" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Comprador</th>
                                            <th>Producto</th>
                                            <th>Codigo de Orden</th>
                                            <th>Ver</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($orders as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $order->user->name }}</td>
                                            <td>{{ $order->orderDetails->pluck('quantity')->sum() }}</td>
                                            <td>{{ $order->code }}</td>
                                            <td>
                                                <a href="{{ route('orders.show', ['id' => $order->id]) }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @empty 

                                        @endforelse
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Comprador</th>
                                            <th>Producto</th>
                                            <th>Codigo de Orden</th>
                                            <th>Ver</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-packages" role="tabpanel" aria-labelledby="pills-packages-tab">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="section-block">
                                <h2 class="section-title">Productos Registrados</h2>
                            </div>
                        </div>

                        @foreach ($user->shop->posts as $post)

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="product-thumbnail">
                                <div class="product-img-head">
                                    <div class="product-img">
                                        <img src="{{ Storage::url($post->products->first()->images->first()->path) }}"
                                            alt="" class="img-fluid"></div>
                                    <!-- <div class="ribbons">New</div> -->
                                </div>
                                <div class="product-content">
                                    <div class="product-content-head">
                                        <h3 class="product-title"></h3>
                                        <div class="product-rating d-inline-block">
                                            <i class="fa fa-fw fa-star"></i>
                                            <i class="fa fa-fw fa-star"></i>
                                            <i class="fa fa-fw fa-star"></i>
                                            <i class="fa fa-fw fa-star"></i>
                                            <i class="fa fa-fw fa-star"></i>
                                        </div>
                                        <div class="product-price">
                                            ${{ number_format($post->products->first()->price,2,',','.') }}</div>
                                    </div>
                                    <div class="product-btn">
                                        <a href="{{ route('single-product', $post->products->first()->code) }}"
                                            class="btn btn-primary">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach




                    </div>
                </div>
                <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                    <div class="card">
                        <h5 class="card-header">Valoraciones de {{ $user->name }}</h5>
                        @foreach ($valuations as $valuation)
                        <div class="card-body border-top">
                            <div class="review-block">
                                <p class="review-text font-italic m-0">“{{ $valuation->comment }}”</p>
                                <div class="rating-star mb-4">
                                    @for ($i = 1; $i < $valuation->rating; $i++)
                                        <i class="fa fa-fw fa-star"></i>
                                        @endfor
                                </div>
                                <span class="text-dark font-weight-bold">{{ $valuation->user->name }}</span><small
                                    class="text-mute"></small>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{ $valuations->links() }}
                </div>
                <div class="tab-pane fade" id="pills-msg" role="tabpanel" aria-labelledby="pills-msg-tab">
                    <div class="card">
                        <h5 class="card-header">Send Messages</h5>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div
                                        class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-3 col-md-12 col-sm-12 col-12 p-4">
                                        <div class="form-group">
                                            <label for="name">Your Name</label>
                                            <input type="text" class="form-control form-control-lg" id="name"
                                                placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Your Email</label>
                                            <input type="email" class="form-control form-control-lg" id="email"
                                                placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="subject">Subject</label>
                                            <input type="text" class="form-control form-control-lg" id="subject"
                                                placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="messages">Messgaes</label>
                                            <textarea class="form-control" id="messages" rows="3"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary float-right">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end campaign tab one -->
        <!-- ============================================================== -->
    </div>
    </div>
    <!-- ============================================================== -->
    <!-- end profile -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- campaign data -->
    <!-- ============================================================== -->
    
    <!-- ============================================================== -->
    <!-- end campaign data -->
    <!-- ============================================================== -->
</div>




@endsection

@include('parts.datatables')
