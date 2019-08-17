@extends('plantilla.principal')
@section('titulo','Mis Examenes')
@section('contenido')

<?php 
use \HuellaPlantar\Http\Controllers\DiagnosticoController;
use \HuellaPlantar\Http\Controllers\UsuarioController;
?>

<div class="container">
	<div class="row">
		<div class="col">
			<p><h3>Mis Examenes: </h3></p>
		</div>
	</div>

	@if (isset($data))
	@foreach ($data as $examen)
	<div class="row">
		<div class="col text-center">
			<img src="/images_examenes/originales/{{$examen->imagen_original}}" width="400" height="400" class="img-thumbnail">
			<br>
			<div class="text-left">
			<p><h5>Observaciones: </h5></p>
			<?php $data_temp=DiagnosticoController::showactives($examen->id_examen);?>
			@foreach ($data_temp as $diagnostico)
			<p></p>
			<table class="table text-left">
				<tr>
					<?php $data_temp2=UsuarioController::show($diagnostico->id_medico);?>
				    <td><b>Medico: </b>@foreach ($data_temp2 as $medico){{$medico->nombres." ".$medico->apellidos}}@endforeach</td>
			    </tr>
				<tr>
				    <td><b>Observación:</b> {{$diagnostico->diagnostico}}</td>
				</tr>
			</table>
			@endforeach
			</div>
		</div>
		<div class="col text-center">
			<img src="/images_examenes/resultados/{{$examen->imagen_izq}}" width="300" class="img-thumbnail">			
		</div>
		<div class="col text-center">
			<img src="/images_examenes/resultados/{{$examen->imagen_der}}" width="300" class="img-thumbnail">			
		</div>
	</div>

	<div class="row">
		<div class="col">
			
		</div>

		<div class="col">
			<p><h5>Resultados Pie Izquierdo: </h5></p>
			<table class="table text-left">
				<tbody>
					<tr>
						<th scope="row">Clasificación</th>
				        <td>{{$examen->clasi_izq}}</td>
					</tr>
					<tr>
						<th scope="row">% de Corvo</th>
				        <td>{{$examen->indice_izq}}</td>
					</tr>
					<tr>
						<th scope="row">Valor X</th>
				        <td>{{$examen->vx_izq}}</td>
					</tr>
					<tr>
						<th scope="row">Valor Y</th>
				        <td>{{$examen->vy_izq}}</td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="col">
			<p><h5>Resultados Pie Derecho: </h5></p>
			<table class="table text-left">
				<tbody>
					<tr>
						<th scope="row">Clasificación</th>
				        <td>{{$examen->clasi_der}}</td>
					</tr>
					<tr>
						<th scope="row">% de Corvo</th>
				        <td>{{$examen->indice_der}}</td>
					</tr>
					<tr>
						<th scope="row">Valor X</th>
				        <td>{{$examen->vx_der}}</td>
					</tr>
					<tr>
						<th scope="row">Valor Y</th>
				        <td>{{$examen->vy_der}}</td>
					</tr>
				</tbody>
			</table>
			
		</div>
		
	</div>

	@endforeach
	@endif
</div>
<br>
@endsection