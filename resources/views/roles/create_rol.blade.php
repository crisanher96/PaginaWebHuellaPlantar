@extends('plantilla.principal')
@section('titulo','Roles')
@section('contenido')
<div class="container">
	<div class="row">
		<div class="col">
			<p><h3>Gestión y administración de Roles: </h3></p>
			<br>
			@if (isset($mensaje)) 
				<div class="alert alert-success">{{$mensaje}}</div>
			@endif

			@if (isset($data_m))
				@foreach ($data_m as $rol) 
					<form class="form-group" method="POST" action="/rolcontroller/{{$rol->id_rol}}">
						@method('PUT')
						@csrf
						<label for="">Nombre Rol:</label>
						<input type="text" name="nombre_rol" class="form-control" value="{{$rol->nombre_rol}}" required="required">
						<label for="">Descripción:</label>
						<input type="text" name="descripcion_rol" class="form-control" value="{{$rol->descripcion_rol}}" required="required">
						<br>
						<button type="submit" class="btn btn-primary" style="background-color: #0E6655">Modificar</button>
					</form>
				@endforeach
			@else
				<form class="form-group" method="POST" action="/rolcontroller">
						@csrf
						<label for="">Nombre Rol:</label>
						<input type="text" name="nombre_rol" class="form-control" placeholder="Nombre del Rol" required="required">
						<label for="">Descripción:</label>
						<input type="text" name="descripcion_rol" class="form-control" placeholder="Descripción del Rol" required="required">
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
				      <th scope="col">Descripción</th>
				      <th scope="col">Editar</th>
				      <th scope="col">Activar/Desactivar</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach ($data as $rol)
					    <tr>
					      <th scope="row">{{$rol->id_rol}}</th>
					      <td>{{$rol->nombre_rol}}</td>
					      <td>{{$rol->descripcion_rol}}</td>
					      <td>
					      	<form class="form-group" method="GET" action="/rolcontroller/{{$rol->id_rol}}/edit">
					      		@csrf
					      		<input type=image src="/images/icon_editar.png" width="40" height="40">
					      	</form>
					      </td>
					      <td>
					      	<form class="form-group" method="POST" action="/rolcontroller/{{$rol->id_rol}}">
					      		@method('DELETE')
					      		@csrf
					      		@if($rol->estado==1)
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