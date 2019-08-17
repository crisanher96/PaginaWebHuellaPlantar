@extends('plantilla.principal')
@section('titulo','Categorias-Deportivas')
@section('contenido')
<div class="container">
	<div class="row">
		<div class="col">
			<p><h3>Gestión y administración de Categorias Deportivas: </h3></p>
			<br>
			@if (isset($mensaje)) 
				<div class="alert alert-success">{{$mensaje}}</div>
			@endif

			@if (isset($data_m))
				@foreach ($data_m as $cat_dep) 
					<form class="form-group" method="POST" action="/categoriadeportivacontroller/{{$cat_dep->id_cat_dep}}">
						@method('PUT')
						@csrf
						<label for="">Nombre Categoria Deportiva:</label>
						<input type="text" name="nombre_cat_dep" class="form-control" value="{{$cat_dep->nombre_cat_dep}}" required="required">
						<br>
						<button type="submit" class="btn btn-primary" style="background-color: #0E6655">Modificar</button>
					</form>
				@endforeach
			@else
				<form class="form-group" method="POST" action="/categoriadeportivacontroller">
						@csrf
						<label for="">Nombre Categoria Deportiva:</label>
						<input type="text" name="nombre_cat_dep" class="form-control" placeholder="Nombre de la Categoria Deportiva" required="required">
						<br>
						<button type="submit" class="btn btn-primary" style="background-color: #0E6655">Registrar</button>
					</form>
			@endif
			
			@if (isset($data))
				<table class="table text-center">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Nombre</th>
				      <th scope="col">Editar</th>
				      <th scope="col">Activar/Desactivar</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach ($data as $cat_dep)
					    <tr>
					      <th scope="row">{{$cat_dep->id_cat_dep}}</th>
					      <td>{{$cat_dep->nombre_cat_dep}}</td>
					      <td>
					      	<form class="form-group" method="GET" action="/categoriadeportivacontroller/{{$cat_dep->id_cat_dep}}/edit">
					      		@csrf
					      		<input type=image src="/images/icon_editar.png" width="40" height="40">
					      	</form>
					      </td>
					      <td>
					      	<form class="form-group" method="POST" action="/categoriadeportivacontroller/{{$cat_dep->id_cat_dep}}">
					      		@method('DELETE')
					      		@csrf
					      		@if($cat_dep->estado==1)
					      		<input type=image title="Desactivar" src="/images/icon_eliminar.png" width="40" height="40">
					      		@else
					      		<input type=image title="Activar" src="/images/icon_ok.png" width="40" height="40">
					      		@endif
					      	</form>
					      </td>
					    </tr>
				   	@endforeach
				  </tbody>
				</table>
			@endif
		</div>
		<div class="col">			 
		</div>
	</div>
</div>
<br>
@endsection