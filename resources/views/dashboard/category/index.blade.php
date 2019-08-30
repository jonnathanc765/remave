@extends('dashboard.layouts.app')

@section('categories')
    active
@endsection

@section('title')
Categorias
@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('css/estilos-categorias.css') }}"/>
<link rel="stylesheet" href="{{ asset('css/estilostabla.css') }}"/>

<div  class="col-md-2 ml-auto">
	<button type="button" class="mb-4 btn boton" data-toggle="modal" data-target="#guardarCategoria">
  <i class="mr-2 fas fa-plus"></i>Nueva Categoria</button>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
					<h2 class="text-center">Lista de categorías</h2>

				
					<div class="accordion" id="accordionExample">
					@foreach($date as $category)

						<div class="card">
							<div class="card-header" id="heading-{{ $category->id }}">
								<h2 class="mb-0">
									<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-{{ $category->id }}" aria-expanded="true" aria-controls="collapse-{{ $category->id }}">
										{{ $category->name }}
									</button>
								</h2>
							</div>
					
							<div id="collapse-{{ $category->id }}" class="collapse {{ $loop->iteration == 1? 'show':'' }}" aria-labelledby="heading-{{ $category->id }}" data-parent="#accordionExample">
								<div class="card-body">
									
									
									<p>
										Nombre de la categoria: <span> {{ $category->name }}</span>
									</p>
									<p>
										Descripción: <span> {{ $category->description }}</span>
									</p>
									<form action="{{ route('category.destroy', $category) }}" method="post">
										{{ csrf_field() }}
									</form>

									<table class="table text-center table-bordered table-responsive">
										<thead>
												<th>#</th>
												<th>Categoria</th>
												<th>Descripcion</th>
												<th>Productos registrados</th>
												<td></td>
										</thead>
										<tbody>
											@forelse($category->subCategories as $subcategory)
												<tr>
														<td>{{$loop->iteration}}</td>
														<td>{{ $subcategory->name }}</td>
														<td>{{ $subcategory->description}}</td>
														<td>{{ $subcategory->totalProducts() }}</td>
														<td class="opciones-tabla">
															<form method="POST" action="{{ route('Subcategory.destroy', $subcategory ) }}" accept-charset="utf-8">
																{{ csrf_field() }}
																{{ method_field('DELETE') }}
																<button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
																<a href="{{route('Subcategory.edit', [$category, $subcategory])}}" class="btn btn-success"><i class="fas fa-pen"></i></a>
																{{-- <a type="submit" href="{{route('Subcategory.list', $category)}}" class="btn btn-secudary"><i class="fas fa-plus"></i></a> --}}
															</form>
														</td>
												</tr>
												@empty
												<h2>No hay ninguna subcategoria relacionada a esta categoría</h2>
												@endforelse
										</tbody>
									</table>
									<div class="opciones-categoria d-flex justify-content-end mt-2">
										<form action="{{ route('category.destroy', $category) }}" method="POST">
											@csrf
											@method('DELETE')
											<button type="submit" class="btn btn-danger"><span>Eliminar esta categoria</span><i class="far fa-trash-alt"></i></button>
										</form>
										<a href="{{ route('category.edit', $category) }}" class="mx-3 btn btn-info"><span>Editar esta categoria</span><i class="fas fa-pen"></i></a>
										<a href="{{ route('Subcategory.create', $category) }}" class="btn btn-success"><span>Agregar nueva Sub-Categoria</span><i class="fas fa-plus"></i></a>
									</div>
								</div>
							</div>
						</div>
						
						@endforeach
					</div>

					<div class="row">
						<div class="col-md-12 d-flex justify-content-center mt-4">
							{{ $date->links() }}
						</div>
					</div>


        </div>
    </div>
</div>

{{-- =============== Modal para agregar ================== --}}

<div class="modal fade" id="guardarCategoria" tabindex="-1" role="dialog" aria-labelledby="guardarCategoriaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
	 <form action="{{route('category.store')}}" method="POST" accept-charset="utf-8">
	            @csrf
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="guardarCategoriaLabel">Agregar Categoria</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="form-group">
	                    <label for="">Categoria</label>
	                    <input type="text" name="name" class="form-control">
	                </div>    
	                @if($errors->has('name'))
				  		<div class="alert alert-danger">
								<ul>
									@foreach($errors->get('name') as $error)
									<li> {{ $error }}</li>
									@endforeach
								</ul>
							</div>
				  		@endif 
	                <div class="form-group">
	                    <label for="">descripcion</label>
	                    <textarea type="text" name="description" class="form-control"></textarea> 
	               </div>
	                @if($errors->has('description'))
				  		<div class="alert alert-danger">
							<ul>
								@foreach($errors->get('description') as $error)
								<li> {{ $error }}</li>
								@endforeach
							</ul>
						</div>
				  		@endif
	      </div>
	      <div class="modal-footer">
	        <button type="submit" class="btn-primary btn boton">Guardar</button>
	      </div>
	    </div>
	   </form>
  </div>
</div>

{{-- =============== fin Modal para agregar ================== --}}

@endsection