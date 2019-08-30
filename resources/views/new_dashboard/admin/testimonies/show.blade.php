@extends('new_dashboard.layouts.app')

@section('testimonies')
    active
@endsection

@section('title')
    Testimonio del proveedor {{ $testimonie->provider->name }}
@endsection

@section('content')
<div class="col-md-12 col-12 col-xs-12 col-lg-12">
    <div class="card">
        <div class="card-header">
            {{ $testimonie->provider->name }}
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p>{{ $testimonie->testimonie }}</p>
                <footer class="blockquote-footer">{{ $testimonie->client->name }} -
                    <cite title="Source Title">Cliente</cite>
                </footer>
            </blockquote>
            <div class="mt-4 d-flex justify-content-end">
                <a class="btn btn-danger btn-rounded text-white" data-target="#modal-delete" data-toggle="modal">Eliminar</a>
                <a href="{{ url()->previous() }}" class="btn btn-primary btn-rounded ml-1">Volver</a>
            </div>
        </div>
    </div>
    {{-- Modal para eliminar --}}
    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modal-borrar" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-borrar">Confirmar</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body">
                    <p>¿Esta seguro que desea eliminar este testimonio?</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('testimonie.destroy', $testimonie) }}" method="POST">
                        @csrf 
                        @method('DELETE')
                        <button href="#" class="btn btn-danger btn-rounded"><i class="fas fa-trash-alt"></i> Confirmar</button>
                        <a href="#" class="btn btn-primary btn-rounded" data-dismiss="modal"><i class="fas fa-sign-out-alt"> Cerrar</i></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection