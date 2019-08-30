@extends('dashboard.layouts.app')

@section('evaluationprovider')
    active
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="">Valoracion de proveedores</h2>
        </div>
    </div>
    <div class="row tabla">
        <div class="col table-responsive">


            <div id="accordion">
                @foreach($shops as $shop)

                
           
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-primary" data-toggle="collapse" data-target="#collapse-{{ $loop->iteration }}" aria-expanded="true" aria-controls="collapse-{{ $loop->iteration }}">
                                {{ $shop->user->name }} 
                            </button>
                            <p class="text-right">
                                Promedio: {{ intval($shop->user->responseAvg()) }}
                                @for($i = 0; $i < intval($shop->user->responseAvg()); $i++)
                                <i class="fas fa-star" style="color: #ffed00"></i>
                                @endfor
                                @for($i = intval($shop->user->responseAvg()); $i < 5 ; $i++)
                                <i class="far fa-star"></i>
                                @endfor
                            </p>
                        </h5>
                    </div>

                    <div id="collapse-{{ $loop->iteration }}" class="collapse {{ $loop->iteration==1? 'show':'' }}" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <th>#</th>
                                    <th>cliente</th>
                                    <th>Calidad de producto</th>
                                    <th>Tiempo de respuesta</th>
                                
                                </thead>
                                <tbody>
                             
                                    
                                    @forelse($shop->user->evaluations as $evaluation)
                                    
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $evaluation->client->name }}</td>
                                        <td>
                                            @for($i = 0; $i < $evaluation->quality_product; $i++)
                                            <i class="fas fa-star" style="color: #ffed00"></i>
                                            @endfor
                                            @for($i = $evaluation->quality_product; $i < 5 ; $i++)
                                            <i class="far fa-star"></i>
                                            @endfor
                                        </td>
                                        <td>
                                            @for($i = 0; $i < $evaluation->response_time; $i++)
                                            <i class="fas fa-star" style="color: #ffed00"></i>
                                            @endfor
                                            @for($i = $evaluation->response_time; $i < 5 ; $i++)
                                            <i class="far fa-star"></i>
                                            @endfor
                                        </td>                                        
                                    </tr>
                                    @empty
                                    <h2>Sin registros</h2>
                                    @endforelse
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>         
            @endforeach
            </div>

                      <div class="row">
                        <div class="col-md-12 d-flex justify-content-center mt-4">
                            {{ $shops->links() }}
                        </div>
                    </div>                    
        </div>
    </div>
</div>
@endsection
