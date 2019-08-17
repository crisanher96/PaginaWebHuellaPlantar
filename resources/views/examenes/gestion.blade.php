@extends('plantilla.principal')
@section('titulo','Mis Examenes')
@section('contenido')

<div class="container">
	<div class="row">
		<div class="col">
			<p><h3>Examenes Pendientes: </h3></p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<br>			
			@if (isset($data2))
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
				  	@foreach ($data2 as $examen)
					    <tr>					    	
					      <th scope="row">{{$examen->id_examen}}</th>
					      <td>{{$examen->fecha}}</td>
					      <td>{{$examen->clasi_izq}}</td>
					      <td>{{$examen->clasi_der}}</td>
					      <td>{{$examen->indice_izq}}</td>
					      <td>{{$examen->indice_der}}</td>
					     
					      <td>
					      	<form class="form-group" method="POST" action="/gestion-diagnostico/{{$examen->id_examen}}/{{1}}">
					      		@csrf
					      		<input title="Generar Diagnostico" type=image src="/images/icon_diagnostico.png" width="40" height="40">
					      	</form>
					      </td>
					    </tr>
				   	@endforeach
				  </tbody>
				</table>
			@endif
		</div>
	</div>
	
	<div class="row">
	<div class="col">
			<p><h3>Examenes: </h3></p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<br>			
			@if (isset($data1))
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
				  	@foreach ($data1 as $examen)
					    <tr>					    	
					      <th scope="row">{{$examen->id_examen}}</th>
					      <td>{{$examen->fecha}}</td>
					      <td>{{$examen->clasi_izq}}</td>
					      <td>{{$examen->clasi_der}}</td>
					      <td>{{$examen->indice_izq}}</td>
					      <td>{{$examen->indice_der}}</td>
					     
					      <td>
					      	<form class="form-group" method="POST" action="/gestion-diagnostico/{{$examen->id_examen}}/{{2}}">
					      		@csrf
					      		<input title="Generar Diagnostico" type=image src="/images/icon_diagnostico.png" width="40" height="40">
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