@extends('dashboard.layouts.app')

@section('valorations')
active
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Mi Valoracion Es de {{ intval($valorations->first()->provider->responseAvg()) }}
                <i class="fas fa-star" style="color: #ffed00"></i>
            </h2>
        </div>
    </div>
    <div class="row tabla">
        <div class="col table-responsive">
            <table class="table table-bordered">
                <thead>
                    <th>#</th>
                    <th>cliente</th>
                    <th>Calidad de producto</th>
                    <th>Tiempo de respuesta</th>
                </thead>
                <tbody>
                    @foreach($valorations as $valoration)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $valoration->client->name }}</td>
                        <td>
                            @for($i = 0; $i < $valoration->quality_product; $i++)
                                <i class="fas fa-star" style="color: #ffed00"></i>
                            @endfor
                            @for($i = $valoration->quality_product; $i < 5 ; $i++) 
                                <i class="far fa-star"></i>
                            @endfor
                        </td>
                        <td>
                            @for($i = 0; $i < $valoration->response_time; $i++)
                                <i class="fas fa-star" style="color: #ffed00"></i>
                            @endfor
                            @for($i = $valoration->response_time; $i < 5 ; $i++) 
                                <i class="far fa-star"></i>
                            @endfor
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>


{{-- </div>
</div>
</div> --}}
@endsection
