@extends('plantilla.principal')
@section('titulo','Inicio')
@section('contenido')

<div class="container" >
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	  <ol class="carousel-indicators">
	    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
	    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
	    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
	  </ol>
	  <div class="carousel-inner">
	    <div class="carousel-item active">
	      <img src="/images/slider/imagen1.jpg" class="d-block w-100" alt="...">
	      <div class="carousel-caption d-none d-md-block">
		    <h2>Cuida tu Salud</h2>
		    <p>Practica buenos habitos y realizate chequeos periodicamente.</p>
		  </div>
	    </div>
	    <div class="carousel-item">
	      <img src="/images/slider/imagen2.jpg" class="d-block w-100" alt="...">
	    </div>
	    <div class="carousel-item">
	      <img src="/images/slider/imagen3.jpg" class="d-block w-100" alt="...">
	    </div>
	    <div class="carousel-item">
	      <img src="/images/slider/imagen4.jpg" class="d-block w-100" alt="...">
	    </div>
	  </div>
	  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Anterior</span>
	  </a>
	  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only">Siguiente</span>
	  </a>
	</div>
</div>
<br>

<div class="container">
	<div class="card-columns">
  <div class="card">
    <img src="/images/slider/card1.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Aplicativo</h5>
      <p class="card-text">Aplicativo desarrollado bajo android studio y laravel.</p>
    </div>
  </div>
  
  <div class="card">
    <img src="/images/slider/card3.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Diagnostico mediante Corvo</h5>
      <p class="card-text">Inspecciona la salud de tus pies bajo el metodo de Hernandez Corvo.</p>
      
    </div>
  </div>
    
  <div class="card">
    <img src="/images/slider/card4.jpg" class="card-img-top" alt="...">
  </div>
  <div class="card p-3 text-right">
    <blockquote class="blockquote mb-0">
      <p>Genera tus propios reportes estadisticos.</p>
      <footer class="blockquote-footer">
        <small class="text-muted"><cite title="Source Title"></cite>
        </small>
      </footer>
    </blockquote>
  </div>
  
</div>
</div>
@endsection