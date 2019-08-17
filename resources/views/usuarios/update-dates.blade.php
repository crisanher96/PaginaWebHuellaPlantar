@extends('plantilla.principal')
@section('titulo','Modificación de Datos')
@section('contenido')
<?php 
use \HuellaPlantar\Http\Controllers\DeporteController;
use \HuellaPlantar\Http\Controllers\CategoriaDeportivaController;
use \HuellaPlantar\Http\Controllers\ProfesionController;
?>
<div class="container">
	<div class="row">
		<div class="col">
			<p><h3>Actualizacion de Datos: </h3></p>
			<br>
		</div>
		<div class="col">
		</div>
	</div>

	<div class="row">
		<div class="col">
			@if (isset($mensaje)) 
				@if($typemen=='1')
					<div class="alert alert-success">{{$mensaje}}</div>
				@endif
				@if($typemen=='0')
					<div class="alert alert-danger">{{$mensaje}}</div>
				@endif
			@endif
		</div>
		<div class="col">
		</div>
	</div>


	@foreach ($data as $user)
	<form class="form-group" method="POST" action="/usuariocontroller/{{$user->id_usuario}}">
		@method('PUT')
		@csrf
	<div class="row">
		<div class="col">
			<label for="">Numero de Identificación:</label>
			<input type="number" name="num_iden" class="form-control" value="{{$user->num_iden}}" readonly="readonly">
			<label for="">Nombres:</label>
			<input type="text" name="nombres" class="form-control" value="{{$user->nombres}}" required="required">
			<label for="">Apellidos:</label>
			<input type="text" name="apellidos" class="form-control" value="{{$user->apellidos}}" required="required">
			<label for="">Email:</label>
			<input type="text" name="email" class="form-control" value="{{$user->email}}" required="required">
			<label for="">Telefono:</label>
			<input type="number" name="telefono" class="form-control" value="{{$user->telefono}}" required="required">
			<label for="">Dirección:</label>
			<input type="text" name="direccion" class="form-control" value="{{$user->direccion}}" required="required">
			<label for="">Fecha de Nacimiento:</label>
			<input type="date" name="fech_nacimiento" class="form-control" value="{{$user->fech_nacimiento}}" required="required">
			<label for="">Deporte Practicado:</label>
			<select name="id_deporte" class="form-control">
				    <?php $data_temp=DeporteController::show($user->id_deporte);?>
					@foreach ($data_temp as $deporte)
						<option value="{{$deporte->id_deporte}}">{{$deporte->nombre_deporte}}</option>
		      			@endforeach
		      			<?php $data_temp=DeporteController::showactives();?>
					@foreach ($data_temp as $deporte)
						<option value="{{$deporte->id_deporte}}">{{$deporte->nombre_deporte}}</option>
		      			@endforeach
			</select>
			<label for="">Categoria Deportiva:</label>
			<select name="id_cat_dep" class="form-control">
				    <?php $data_temp=CategoriaDeportivaController::show($user->id_cat_dep);?>
					@foreach ($data_temp as $categoria)
						<option value="{{$categoria->id_cat_dep}}">{{$categoria->nombre_cat_dep}}</option>
		      			@endforeach
		      			<?php $data_temp=CategoriaDeportivaController::showactives();?>
					@foreach ($data_temp as $categoria)
						<option value="{{$categoria->id_cat_dep}}">{{$categoria->nombre_cat_dep}}</option>
		      			@endforeach
			</select>
		</div>
		<div class="col">
			<label for="">Ocupación:</label>
			<select name="id_profesion" class="form-control">
				    <?php $data_temp=ProfesionController::show($user->id_profesion);?>
					@foreach ($data_temp as $profesion)
						<option value="{{$profesion->id_profesion}}">{{$profesion->nombre_profesion}}</option>
		      			@endforeach
		      			<?php $data_temp=ProfesionController::showactives();?>
					@foreach ($data_temp as $profesion)
						<option value="{{$profesion->id_profesion}}">{{$profesion->nombre_profesion}}</option>
		      			@endforeach
			</select>
			<label for="">Peso (Kg):</label>
			<input type="number" name="peso" class="form-control" value="{{$user->peso}}" required="required">
			<label for="">Estatura (cm):</label>
			<input type="number" name="estatura" class="form-control" value="{{$user->estatura}}" required="required">
			<label for="">Enfermedades:</label>
			 <textarea name="enfermedades" class="form-control" rows="5" required="required">{{$user->enfermedades}}</textarea>
			 <label for="">Alergias:</label>
			 <textarea name="alergias" class="form-control" rows="5" required="required">{{$user->alergias}}</textarea>

			<label for="">Verifique su Contraseña:</label>
			<input type="password" name="password" class="form-control" placeholder="*******" required="required">
			<br>
			<button type="submit" class="btn btn-primary" style="background-color: #0E6655">Modificar</button>
		</div>
	</div>	
	</form>
	@endforeach
</div>
<br>
@endsection