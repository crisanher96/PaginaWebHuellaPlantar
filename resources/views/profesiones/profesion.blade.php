@extends('plantilla.principal')
@section('titulo','Ocupaciones')
@section('contenido')
<div class="container">
	<div class="row">
		<div class="col">
			<p><h3>Gestión y administración de Ocupaciones: </h3></p>
			<br>
			@if (isset($mensaje)) 
				<div class="alert alert-success">{{$mensaje}}</div>
			@endif

			@if (isset($data_m))
				@foreach ($data_m as $profesion) 
					<form class="form-group" method="POST" action="/profesioncontroller/{{$profesion->id_profesion}}">
						@method('PUT')
						@csrf
						<label for="">Nombre Ocupación:</label>
						<input type="text" name="nombre_profesion" class="form-control" value="{{$profesion->nombre_profesion}}" required="required">
						<br>
						<button type="submit" class="btn btn-primary" style="background-color: #0E6655">Modificar</button>
					</form>
				@endforeach
			@else
				<form class="form-group" method="POST" action="/profesioncontroller">
						@csrf
						<label for="">Nombre Ocupación:</label>
						<input type="text" name="nombre_profesion" class="form-control" placeholder="Nombre de la Ocupación" required="required">
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
				  	@foreach ($data as $profesion)
					    <tr>
					      <th scope="row">{{$profesion->id_profesion}}</th>
					      <td>{{$profesion->nombre_profesion}}</td>
					      <td>
					      	<form class="form-group" method="GET" action="/profesioncontroller/{{$profesion->id_profesion}}/edit">
					      		@csrf
					      		<input type=image src="/images/icon_editar.png" width="40" height="40">
					      	</form>
					      </td>
					      <td>
					      	<form class="form-group" method="POST" action="/profesioncontroller/{{$profesion->id_profesion}}">
					      		@method('DELETE')
					      		@csrf
					      		@if($profesion->estado==1)
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