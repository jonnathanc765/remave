@extends('frontend.layouts.app')

@section('title')
Categorias
@endsection

@section('categories')
active
@endsection

@section('content')

{{-- @include('frontend.parts._start-banner') --}}

<!-- ================ category section start ================= -->
<section class="section-margin--small mb-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                @include('frontend.parts._categories-sidebar')
            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <!-- Start Filter Bar -->
                <form action="{{ route('categories.index') }}" method="get">
                    <div class="filter-bar d-flex flex-wrap align-items-center">
                        <div class="sorting mr-auto">
                            <select name="paginate" onchange="this.form.submit()">
                                <option value="5">Mostrar 5</option>
                                <option value="10">Mostrar 10</option>
                                <option value="20">Mostrar 20</option>
                            </select>
                        </div>
                        <div>
                            <div class="input-group filter-bar-search">
                                <input type="text" placeholder="Buscar" name="s" value="">
                                <div class="input-group-append">
                                    <button type="button"><i class="ti-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- End Filter Bar -->
                <!-- Start Products in This Category -->
                <div class="row">
                    @each('frontend.parts._product-card', $category->products, 'product')
                </div>
                <!-- End Products in This Category -->
            </div>
        </div>
    </div>
</section>
<!-- ================ category section end ================= -->

@include('frontend.parts._top-products')
@endsection
