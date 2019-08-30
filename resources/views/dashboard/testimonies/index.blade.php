@extends('dashboard.layouts.app')

@section('testimonies')
    active
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="">Testimonios de los clientes hacia los proveedores</h2>
        </div>
    </div>
    <div class="row tabla">
        <div class="col table-responsive">
            {{-- buscador de clientes --}}
    {!! Form::open(['route' =>'testimonies', 'method' => 'Get', 'class' => 'navbar-form pull-rigth']) !!}
        
        <div class="row input-group my-3">
            {!! Form::text('name', null, ['class' => 'form-control form-group barra-buscar float-right', 'placeholder' => 'Buscar testimonio...', 'aria-describedby' => 'search']) !!}
            <button class="icono-buscar form-group btn btn-default"><i class="fas fa-search"></i></button>
        </div>
    {!! Form::close() !!}        
    
    {{-- fin del buscador de clientes --}}


            <div id="accordion">

            {{-- @foreach($shops as $shop) --}} 
           @foreach($testimonies as $testimonie) 

                <div class="card">
                    <div class="card-header" id="heading-{{ $testimonie->provider->name }}">
                        <h5 class="mb-0">
                            <button class="btn btn-primary" data-toggle="collapse" data-target="#collapse-{{ $loop->iteration }}" aria-expanded="true" aria-controls="collapse-{{ $loop->iteration }}">
                                {{ $testimonie->provider->name }}
                            </button>
                        </h5>
                    </div>

                    <div id="collapse-{{ $loop->iteration }}" class="collapse {{ $loop->iteration==1? 'show':'' }}" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <th>#</th>
                                    <th>Usuario</th>
                                    <th>proveedor</th>
                                    <th>Testimonio</th>
                                    <th>Aciones</th> 
                                </thead>
                                <tbody>
                                     {{-- {{dd($shop->user->testimonies)}} --}}
            {{--  @forelse($shop->user->testimonies as $testimonie) --}}
                                
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $testimonie->client->name }}</td>
                                        <td>{{ $testimonie->provider->name }}</td>
                                        <td>{{substr($testimonie->testimonie,0 , 20)}}...</td>
                                        <td><a class="btn btn-success btn-xs" href="{{ route('testimonie.show', $testimonie) }}"><i class="far fa-eye"></i></a></td>
                                    <h2>Sin registros</h2>
                                    </tr>
                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                                      {{-- @empty
                                @endforelse --}}
          
            @endforeach
            </div>

                    
        </div>
    </div>
    {{$testimonies->links()}}
</div> 
@endsection