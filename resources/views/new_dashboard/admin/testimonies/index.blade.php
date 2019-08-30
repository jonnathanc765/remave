@extends('new_dashboard.layouts.app')

@section('testimonies')
    active
@endsection

@section('title')
Testimonios
@endsection

@section('content')

<div class="col-12 col-md-12 col-sm-12 col-xs-12 col-lg-12 justify-content-center">
    <div class="accrodion-regular">
        <div id="accordion">
            <div class="card">
                {{-- Trae todos los proveedores, y luego itera todos los testimonios de cada proveedor --}}
                @foreach($providers as $provider)
                <div class="card-header" id="heading_{{ $loop->iteration }}">
                    <h5 class="mb-0">
                       <button class="btn btn-link" data-toggle="collapse" data-target="#collapse_{{ $loop->iteration }}" aria-expanded="true" aria-controls="collapse_{{ $loop->iteration }}">
                            <span class="fas fa-angle-down mr-3"></span>    
                            {{ $provider->name }}
                       </button>
                      </h5>
                </div>
                <div id="collapse_{{ $loop->iteration }}" class="collapse {{ $loop->iteration == 1? 'show': '' }}" aria-labelledby="heading_{{ $loop->iteration }}" data-parent="#accordion">
                    <div class="card-body">

                    
                        <div class="table-responsive text-center table-hover">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Testimonio</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($provider->testimonies as $testimonie)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $testimonie->client->name }}</td>
                                        <td>{{ $testimonie->testimonie }}</td>
                                        <td>
                                            <a href="{{ route('testimonie.show', $testimonie) }}" class="btn btn-rounded btn-primary"><i class="fas fa-eye"></i></a>
                                        </td>
                                    </tr> 
                                    @empty
                                        
                                    @endforelse
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-12 d-flex justify-content-center mt-4">
                {{ $providers->links() }}
            </div>
          
        </div>
    </div>
</div>



    
@endsection