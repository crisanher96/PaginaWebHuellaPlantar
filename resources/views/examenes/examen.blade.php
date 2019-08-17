@extends('plantilla.principal')
@section('titulo','Mis Examenes')
@section('contenido')

<div class="container">
	<div class="row">
		<div class="col">
			<p><h3>Mis Examenes: </h3></p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<br>			
			@if (isset($data))
				<table class="table text-center">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Fecha</th>
				      <th scope="col">Pie Izquierdo</th>
				      <th scope="col">Pie Derecho</th>
				      <th scope="col">% Pie Izquiedo</th>
				      <th scope="col">% Pie Derecho</th>
				      <th scope="col"></th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $cont=0; ?>
				  	@foreach ($data as $examen)
					    <tr>
					    	<?php $cont=$cont+1; ?>
					      <th scope="row">{{$cont}}</th>
					      <td>{{$examen->fecha}}</td>
					      <td>{{$examen->clasi_izq}}</td>
					      <td>{{$examen->clasi_der}}</td>
					      <td>{{$examen->indice_izq}}</td>
					      <td>{{$examen->indice_der}}</td>
					     
					      <td>
					      	<form class="form-group" method="GET" action="/examen-more/{{$examen->id_examen}}">
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