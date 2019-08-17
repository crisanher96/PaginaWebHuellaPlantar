@extends('plantilla.principal')
@section('titulo','Registro')
@section('contenido')
<?php 
use \HuellaPlantar\Http\Controllers\DeporteController;
use \HuellaPlantar\Http\Controllers\CategoriaDeportivaController;
use \HuellaPlantar\Http\Controllers\ProfesionController;
?>
<div class="container">
	<div class="row">
		<div class="col">
			<p><h3>Registro de Nuevo Usuario: </h3></p>
			<br>
		</div>
		<div class="col">
			
		</div>
	</div>

	<form class="form-group" method="POST" action="/usuariocontroller">
		@csrf
		<div class="form-group">
			<div class="row">
				<div class="col">
					<label for="">Numero de Identificación:</label>
					<input type="number" name="num_iden" class="form-control" placeholder="Numero de Identificación" required="required">
					<label for="">Nombres:</label>
					<input type="text" name="nombres" class="form-control" placeholder="Nombres" required="required">
					<label for="">Apellidos:</label>
					<input type="text" name="apellidos" class="form-control" placeholder="Apellidos" required="required">
					<label for="">Email:</label>
					<input type="mail" name="email" class="form-control" placeholder="email@mail.com" required="required">
					<label for="">Password:</label>
					<input type="Password" name="password" class="form-control" placeholder="********" required="required">
					<label for="">Telefono:</label>
					<input type="number" name="telefono" class="form-control" placeholder="Telefono" required="required">
					<label for="">Dirección:</label>
					<input type="text" name="direccion" class="form-control" placeholder="Dirección" required="required">
					<label for="">Fecha de Nacimiento:</label>
					<input type="date" name="fech_nacimiento" class="form-control" placeholder="Fecha de Nacimiento" required="required">
					<label for="">Deporte Practicado:</label>
					<select name="id_deporte" class="form-control">
						<?php $data_temp=DeporteController::showactives();?>
						@foreach ($data_temp as $deporte)
							<option value="{{$deporte->id_deporte}}">{{$deporte->nombre_deporte}}</option>
   		      			@endforeach
					</select>
				</div>
				<div class="col">
					<label for="">Categoria Deportiva:</label>
					<select name="id_cat_dep" class="form-control">
					    <?php $data_temp=CategoriaDeportivaController::showactives();?>
						@foreach ($data_temp as $categoria)
							<option value="{{$categoria->id_cat_dep}}">{{$categoria->nombre_cat_dep}}</option>
   		      			@endforeach
					</select>
					<label for="">Ocupación:</label>
					<select name="id_profesion" class="form-control">
					    <?php $data_temp=ProfesionController::showactives();?>
						@foreach ($data_temp as $profesion)
							<option value="{{$profesion->id_profesion}}">{{$profesion->nombre_profesion}}</option>
   		      			@endforeach
					</select>
					<label for="">Peso (Kg):</label>
					<input type="number" name="peso" class="form-control" placeholder="Peso en kilogramos" required="required">
					<label for="">Estatura (cm):</label>
					<input type="number" name="estatura" class="form-control" placeholder="Estatura en Centimetros" required="required">
					<label for="">Enfermedades:</label>
					 <textarea name="enfermedades" class="form-control" rows="5" placeholder="Detalle sus enfermedades, en caso de no presentar indique 'Niguna'." required="required"></textarea>
					 <label for="">Alergias:</label>
					 <textarea name="alergias" class="form-control" rows="5" placeholder="Detalle sus alergias, en caso de no presentar indique 'Niguna'." required="required"></textarea>
				</div>
			</div>
		</div>
		<button type="submit" class="btn btn-primary" style="background-color: #0E6655">Registrar</button>
	</form> 
	
		<div class="col text-center ">
			 
		</div>
</div>
@endsection