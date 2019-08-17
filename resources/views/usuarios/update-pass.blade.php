@extends('plantilla.principal')
@section('titulo','Cambio de Contraseña')
@section('contenido')
<div class="container">
	<div class="row">
		<div class="col">
			<p><h3>Cambio de Contraseña: </h3></p>
			<br>
			@if (isset($mensaje)) 
				@if($typemen=='1')
					<div class="alert alert-success">{{$mensaje}}</div>
				@endif
				@if($typemen=='0')
					<div class="alert alert-danger">{{$mensaje}}</div>
				@endif
			@endif
			<form class="form-group" method="POST" action="/pass-edit">
				@csrf
				<label for="">Contraseña Anterior:</label>
				<input type="password" name="password" class="form-control" placeholder="********" required="required">
				<label for="">Nueva Contraseña:</label>
				<input type="password" name="n_password" class="form-control" placeholder="********" required="required">
				<label for="">Verifica la Nueva Contraseña:</label>
				<input type="password" name="vn_password" class="form-control" placeholder="********" required="required">
				<br>
				<button type="submit" class="btn btn-primary" style="background-color: #0E6655">Modificar</button>
			</form>
		</div>
		<div class="col text-center">			 
		</div>
	</div>
</div>
<br>
@endsection