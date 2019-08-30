@extends('new_dashboard.layouts.app')

@section('title', 'Lista de todos los clientes')

@section('users','active')

@section('content')

<div class="row">
    <!-- ============================================================== -->
    <!-- data table  -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">@yield('title')</h5>
                <p>Clientes Registrados en {{ config('app.name') }}</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-hover text-center second datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>DNI</th>
                                <th>Email</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->dni }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <form action="{{ route('clients.destroy', $user) }}" method="POST" id="clients.destroy{{ $loop->iteration }}">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <a class="btn btn-danger btn-rounded"
                                            onclick="event.preventDefault(); confirmDelete('clients.destroy{{ $loop->iteration }}')">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <a href="{{ route('clients.show', $user->id) }}"
                                            class="btn btn-primary btn-rounded"><i class="far fa-eye"></i></a>
                                    </form>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>DNI</th>
                                <th>Email</th>
                                <th>Registro</th>
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
                document.getElementById($id).submit(); // Form submission
            }
        })
    }

</script>
@endsection
