@extends('plantilla.principal')
@section('titulo','Mi Perfil')
@section('contenido')
<?php 
use \HuellaPlantar\Http\Controllers\DeporteController;
use \HuellaPlantar\Http\Controllers\CategoriaDeportivaController;
use \HuellaPlantar\Http\Controllers\ProfesionController;
?>
<div class="container">
	<div class="row">
		<div class="col">
			<p><h3>Datos Personales: </h3></p>
			<br>
		</div>
		<div class="col">
			
		</div>
	</div>

	@foreach ($users as $user)
	<div class="row">
		<div class="col">
			<p>Número de Identificación: {{$user->num_iden}}</p>
			<p>Nombres: {{$user->nombres}}</p>
			<p>Apellidos: {{$user->apellidos}} </p>
			<p>Email: {{$user->email}} </p>
			<p>Contraseña: ************ </p>
			<p>Telefono: {{$user->telefono}} </p>
			<p>Dirección: {{$user->direccion}}</p>
			<p>Fecha de Nacimiento: {{$user->fech_nacimiento}}</p>
			<p>Deporte Practicado: 
				<?php $data_temp=DeporteController::show($user->id_deporte);?>
				@foreach ($data_temp as $deporte)
					{{$deporte->nombre_deporte}}
	      		@endforeach
			</p>
			<p>Categoria Deportiva: 
				<?php $data_temp=CategoriaDeportivaController::show($user->id_cat_dep);?>
				@foreach ($data_temp as $categoria)
					{{$categoria->nombre_cat_dep}}
	      		@endforeach
			</p>
			<p>Ocupación: 
				<?php $data_temp=ProfesionController::show($user->id_profesion);?>
				@foreach ($data_temp as $profesion)
					{{$profesion->nombre_profesion}}
	      		@endforeach
			</p>
			<p>Peso: {{$user->peso}}</p>
			<p>Estatura: {{$user->estatura}}</p>
		</div>
		<div class="col">
			<p>Enfermedades: </p>
			<p><textarea rows="4" class="form-control" readonly="readonly">{{$user->enfermedades}}</textarea></p>
			<p>Alergias: </p>
			<p><textarea rows="4" class="form-control" readonly="readonly">{{$user->alergias}}</textarea></p>

			<form class="form-group" method="GET" action="/usuariocontroller/{{$user->id_usuario}}/edit">
				@csrf
				<button type="submit" class="btn btn-primary" style="background-color: #0E6655">Modificar Datos</button>
			</form> 
			<form class="form-group" method="POST" action="/update-pass">
				@csrf
				<button type="submit" class="btn btn-primary" style="background-color: #0E6655">Modificar Contraseña</button>
			</form> 
		</div>
	</div>
	@endforeach
</div>
<br>
@endsection