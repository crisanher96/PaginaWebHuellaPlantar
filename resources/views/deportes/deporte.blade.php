@extends('plantilla.principal')
@section('titulo','Deportes')
@section('contenido')
<div class="container">
	<div class="row">
		<div class="col">
			<p><h3>Gestión y administración de Deportes: </h3></p>
			<br>
			@if (isset($mensaje)) 
				<div class="alert alert-success">{{$mensaje}}</div>
			@endif

			@if (isset($data_m))
				@foreach ($data_m as $deporte) 
					<form class="form-group" method="POST" action="/deportecontroller/{{$deporte->id_deporte}}">
						@method('PUT')
						@csrf
						<label for="">Nombre Deporte:</label>
						<input type="text" name="nombre_deporte" class="form-control" value="{{$deporte->nombre_deporte}}" required="required">
						<br>
						<button type="submit" class="btn btn-primary" style="background-color: #0E6655">Modificar</button>
					</form>
				@endforeach
			@else
				<form class="form-group" method="POST" action="/deportecontroller">
						@csrf
						<label for="">Nombre Deporte:</label>
						<input type="text" name="nombre_deporte" class="form-control" placeholder="Nombre del Deporte" required="required">
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
				  	@foreach ($data as $deporte)
					    <tr>
					      <th scope="row">{{$deporte->id_deporte}}</th>
					      <td>{{$deporte->nombre_deporte}}</td>
					      <td>
					      	<form class="form-group" method="GET" action="/deportecontroller/{{$deporte->id_deporte}}/edit">
					      		@csrf
					      		<input type=image src="/images/icon_editar.png" width="40" height="40">
					      	</form>
					      </td>
					      <td>
					      	<form class="form-group" method="POST" action="/deportecontroller/{{$deporte->id_deporte}}">
					      		@method('DELETE')
					      		@csrf
					      		@if($deporte->estado==1)
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