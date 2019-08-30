@extends('new_dashboard.layouts.app')

@section('providers')
active
@endsection

@section('title')
Lista de todos los provedores.
@endsection

@section('content')

<div class="row">
    <!-- ============================================================== -->
    <!-- data table  -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">

                <h5 class="mb-0">@yield('title')</h5>
                <p>Provedores Registrados en {{ config('app.name') }}</p>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-hover text-center second datatable">
                        <thead>
                            <tr>
                                <th>DNI</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Tienda</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->dni }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->shop->name }} <img style="width: 50px; height: 50px"
                                        src="{{ Storage::url($user->shop->logo) }}" alt="" class="ml-2"></td>
                                <td>
                                    <form action="{{ route('provider.destroy', $user) }}" method="POST" id="provider.destroy{{ $loop->iteration }}">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <a class="btn btn-danger btn-rounded" onclick="event.preventDefault(); confirmDelete('provider.destroy{{ $loop->iteration }}')">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <a href="{{ route('provider.show', $user->id) }}"
                                            class="btn btn-primary btn-rounded"><i class="far fa-eye"></i></a>
                                    </form>
                                    {{-- <a href="{{ route('provider.show', $user) }}" --}}
                                    {{-- class="btn btn-primary btn-rounded">Ver</a> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>DNI</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Registro</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end data table  -->
    <!-- ============================================================== -->
</div>

@endsection



@section('scripts')
<script>
    function confirmDelete($id) {
        Swal.fire({
            title: '¿Esta Seguro?',
            text: 'Por favor confirme su accion!',
            type: 'question',
            showCancelButton: true,
            confirmButtonText: 'Si, continuar!',
            cancelButtonText: 'No, seguir aqui'
        }).then((result) => {
            if (result.value) {
                document.getElementById($id).submit();// Form submission
            }
        })
    }

</script>
@endsection
