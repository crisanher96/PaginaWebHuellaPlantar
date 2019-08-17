<html>
<head>
	<title>Huella Plantar - @yield('titulo')</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	 <link rel="shortcut icon" href="/images/logo2.ico" />
</head>
<?php $rol=session()->get('rol'); ?>

<body style="background-color: #F8F8FF">
<nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #151515">
  <a class="navbar-brand" href="/"><img src="/images/logo4.png" width="230" height="70" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav mr-auto"> 
      <li class="nav-item active">
        <a class="nav-link" href="/">Inicio</a>
      </li>
      @if($rol=='1' or $rol=='2' or $rol=='3' or $rol=='4')
        <li class="nav-item">
          <a class="nav-link" href="/perfil">Mi perfil</a>
        </li>
      @endif
      @if($rol=='1' or $rol=='2' or $rol=='3' or $rol=='4')
        <li class="nav-item">
          <a class="nav-link" href="/examenes">Mis Examenes</a>
        </li>
      @endif
      @if($rol=='1' or $rol=='2')
        <li class="nav-item">
          <a class="nav-link" href="/informes">Gestion de Informes</a>
        </li>
      @endif
      @if($rol=='2')
        <li class="nav-item">
          <a class="nav-link" href="/examenes-gestion">Gestion de Examenes</a>
        </li>
      @endif

      @if($rol=='1')
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administración</a>

          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/admin_users">Usuarios</a>
            <a class="dropdown-item" href="/roles">Roles</a>
            <a class="dropdown-item" href="/deportes">Deportes</a>
            <a class="dropdown-item" href="/ocupaciones">Ocupaciones</a>
            <a class="dropdown-item" href="/categorias-deportivas">Categorias Deportivas</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Examenes</a>
          </div>
        </li>
      @endif

    </ul>

    
    <ul class="navbar-nav ml-auto">
      @if($rol=='1' or $rol=='2' or $rol=='3' or $rol=='4')
        <li class="nav-item">
          <a class="nav-link" href="/exit">Salir</a>
        </li>
      @else
        <li class="nav-item">
          <a class="nav-link" href="/login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/registro">Registro</a>
        </li>
      @endif
    </ul>

  </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #1a1a1a">
  <a class="navbar-brand" href="#"></a>
</nav>
<br>

@yield('contenido')



<br>
<footer class="page-footer">
    
    <div class="container-fluid" style="background-color: #1a1a1a">
      <div class="container">
      <div class="row">
        <div class="col-md-6 mb-4 text-left" style="color: #FFFFFF">
         <br>
          <p><b><h4>Contactenos:</h4></b></p>
          <ul class="list-group list-group-flush">
        		<li class="list-group-item" style="background-color: #1a1a1a">cristianhegarcia@gmail.com - neilcc20@gmail.com</li>
        		<li class="list-group-item" style="background-color: #1a1a1a">+57-3143133225, +57-3132919488</li>
        		<li class="list-group-item" style="background-color: #1a1a1a">Universidad de Cundinamarca - Dg 18 No. 20-29 Fusagasugá</li>
        		<li class="list-group-item" style="background-color: #1a1a1a">Facultad de Ingeniería Electronica</li>
        		
        	</ul>
        </div>
       
        <div class="col-md-6 mb-4 text-center" style="color: #FFFFFF">
        	<br>
        	
        	<a class="navbar-brand" href="/"><img src="/images/logo1.png" width="180" height="250" alt=""></a>
        	
        </div>
      </div>
  </div>
    </div>
 
    <div class="footer-copyright text-center py-3" style="background-color: #151515; color: #FFFFFF">© 2018 Copyright: UCUNDINAMARCA Generación Siglo 21
    </div>
 
  </footer>
 



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>