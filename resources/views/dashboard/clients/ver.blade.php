@extends('dashboard.layouts.app')

@section('clients')
    active
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class=""></h2>
        </div>
    </div>
    <div class="row tabla">
        <div class="col table-responsive">
            <table class="table table-bordered">
                <thead>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>dni</th>
                    <th>email</th>
                    <th>Aciones</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->dni }}</td>
                        <td>{{ $user->email }}</td>
             

                       <form action="{{ route('client.destroy', $user->id) }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <td>                    
                                <button type="submit" class="btn btn-primary"  onclick=" return confirm('seguro que quiere eliminar el Cliente')">E</button>
                                 <a href="{{ url()->previous() }}" class="btn btn-primary">volver</a>
                        </td>
                    </form>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
       
@endsection
