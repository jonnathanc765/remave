@extends('dashboard.layouts.app')

@section('content')
<div  class="col-md-2 mr-auto">
	
  Nueva SubCategoria</a>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table text-center">
                <thead>
                    <th>#</th>
                    <th>Categoria</th>
                    <th>Descripcion</th>
                    <td></td>
                </thead>
                <tbody>
                	@foreach($categorys as $category)
                	<a href="{{ route('Subcategory.create',$category->id) }}" title="">Agregar subcategoria para {{ $category->name }}</a> <br>
	                	@foreach($category->subCategories as $subCategory)
	                	
	                        <tr>
	                    	<td>{{$loop->iteration}}</td>
	                        <td>{{$subCategory->name}}</td>
	                        <td>{{$subCategory->description}}</td>
	                        <td>
	                        <form method="POST" action="{{route('Subcategory.destroy', $category->id)}}" accept-charset="utf-8">
                        		@csrf
                        		<button class="btn btn-secondary" type="submit"  type="submit">X</button>
                        		<a class="btn btn-success" href="{{route('Subcategory.edit', $category->id)}}"><i class="fas fa-pen"></i></a>
                        	</form>
	                        </td>
	                    </tr>
	                    @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection