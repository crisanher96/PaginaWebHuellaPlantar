@extends('plantilla.principal')
@section('titulo','Login')
@section('contenido')
<div class="container">
	<div class="row">
		<div class="col">
			<p><h3>Inicie sesión: </h3></p>
			<br>
			<form class="form-group" method="POST" action="/autenticacion">
				@csrf
				<div class="form-group">
					<label for="">Numero de Identificación:</label>
					<input type="number" name="num_iden" class="form-control" placeholder="Numero de Identificación" required="required">
					<label for="">Contraseña:</label>
					<input type="Password" name="password" class="form-control" placeholder="********" required="required">
				</div>
				@if(isset($mensaje))
					
						<div class="alert alert-danger">{{$mensaje}}</div>
					
				@endif
				<button type="submit" class="btn btn-primary" style="background-color: #0E6655">Ingresar</button>
				
			</form> 
		</div>
		<div class="col text-center">
			 <img src="/images/logo3.png"  width="250" height="380" />
		</div>
		
	</div>
	
</div>
<br>
@endsection