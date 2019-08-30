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
                                <option {{ $paginate == 5 ? 'selected' : '' }} value="5">Mostrar 5</option>
                                <option {{ $paginate == 10 ? 'selected' : '' }} value="10">Mostrar 10</option>
                                <option {{ $paginate == 20 ? 'selected' : '' }} value="20">Mostrar 20</option>
                            </select>
                        </div>
                        <div>
                            <div class="input-group filter-bar-search">
                                <input type="text" placeholder="Buscar" name="s" value="{{ $query }}">
                                <div class="input-group-append">
                                    <button type="button"><i class="ti-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- End Filter Bar -->
                <!-- Start Best Seller -->
                <section class="lattest-product-area pb-40 category-list">
                    <div class="row">
                        @each('frontend.parts._categories', $categories, 'category')
                    </div>
                </section>
                <!-- End Best Seller -->
                <div class="paginate d-flex justify-content-center">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================ category section end ================= -->

@include('frontend.parts._top-products')
@endsection
