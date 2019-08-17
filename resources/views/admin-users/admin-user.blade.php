@extends('plantilla.principal')
@section('titulo','Administración de Usuarios')
@section('contenido')
<?php use \HuellaPlantar\Http\Controllers\RolController;?>
<div class="container">
	<div class="row">
		<div class="col">
			<p><h3>Gestión y administración de Usuarios: </h3></p>
			<br>
			@if (isset($mensaje)) 
				<div class="alert alert-success">{{$mensaje}}</div>
			@endif
			
			@if (isset($data))
				<table class="table text-center">
				  <thead>
				    <tr>
				      <th scope="col">N° Identificación</th>
				      <th scope="col">Nombres</th>
				      <th scope="col">Apellidos</th>
				      <th scope="col">Email</th>
				      <th scope="col">Telefono</th>
				      <th scope="col">Dirección</th>
				      <th scope="col">Rol</th>
				      <th scope="col">Cambio de Rol</th>
				      <th scope="col">Reestablecer Contraseña</th>
				      <th scope="col"></th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach ($data as $user)
					    <tr>
					      <th scope="row">{{$user->num_iden}}</th>
					      <td>{{$user->nombres}}</td>
					      <td>{{$user->apellidos}}</td>
					      <td>{{$user->email}}</td>
					      <td>{{$user->telefono}}</td>
					      <td>{{$user->direccion}}</td>
					      <td><?php $data_temp=RolController::show($user->id_rol);?>
					      			@foreach ($data_temp as $rol)
					      				{{$rol->nombre_rol}}
					      			@endforeach
					      </td>
					      <td>
					      	<form class="form-group" method="GET" action="/rolcontroller/{{$rol->id_rol}}/edit">
					      		@csrf
					      		<input title="Cambio de Rol" type=image src="/images/icon_user.png" width="40" height="40">
					      	</form>
					      </td>
					      <td>
					      	<form class="form-group" method="GET" action="/rolcontroller/{{$rol->id_rol}}/edit">
					      		@csrf
					      		<input title="Reestablecer Contraseña" type=image src="/images/icon_reestablecer.png" width="40" height="40">
					      	</form>
					      </td>
					      <td>
					      	<form class="form-group" method="GET" action="/rolcontroller/{{$rol->id_rol}}/edit">
					      		@csrf
					      		<input title="Ver mas" type=image src="/images/icon_mas.png" width="40" height="40">
					      	</form>
					      </td>
					    </tr>
				   	@endforeach
				  </tbody>
				</table>
			@endif
		</div>
	</div>
</div>
<br>
@endsection