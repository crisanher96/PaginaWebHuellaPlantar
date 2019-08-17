<?php


//RUTA PRINCIPAL
Route::get('/', 'HomeController@index');

//ROLS
Route::resource('rolcontroller','RolController');
Route::get('/roles', 'RolController@index');

//LOGIN
Route::post('/autenticacion', 'SessionController@autenticacion');
Route::get('/login', function () {
    return view('usuarios.login');
});
Route::get('/exit', function () {
    session()->flush();
    return redirect('/');
});

//USUARIO
Route::resource('usuariocontroller','UsuarioController');

//PERFIL
Route::get('/perfil', 'UsuarioController@index');

//UPDATE PASS
Route::post('/update-pass', function () {
    return view('usuarios.update-pass');
});
Route::post('/pass-edit', 'UsuarioController@update_pass');

//REGISTRO
Route::get('/registro', function () {
    return view('usuarios.registrar');
});

//DEPORTES
Route::resource('deportecontroller','DeporteController');
Route::get('/deportes', 'DeporteController@index');

//OCUPACIONES
Route::resource('profesioncontroller','ProfesionController');
Route::get('/ocupaciones', 'ProfesionController@index');

//CATEGORIAS DEPORTIVAS
Route::resource('categoriadeportivacontroller','CategoriaDeportivaController');
Route::get('/categorias-deportivas', 'CategoriaDeportivaController@index');

//ADMINISTRACION DE USUARIOS
Route::resource('adminusercontroller','AdminUserController');
Route::get('/admin_users', 'AdminUserController@index');

//INFORMES
Route::get('/informes', 'InformeController@general');
Route::post('/fil-informe', 'InformeController@filtros');
Route::get('/fil-informe', function () {
    return redirect('/informes');
});


//EXAMENES
Route::get('/examenes', 'ExamenController@index');
Route::get('/examen-more/{id}', 'ExamenController@more');

//EXAMENES-GESTION
Route::get('/examenes-gestion', 'ExamenController@show_gestion');
Route::post('/gestion-diagnostico/{id_examen}/{bandera}', 'ExamenController@diagnostico_gestion');
Route::post('/update-diagnostico/{id_examen}/{bandera}', 'ExamenController@update_diagnostico');
Route::get('/gestion-diagnostico/{id_examen}/{bandera}', function () {
    return redirect('/examenes-gestion');
});
Route::get('/update-diagnostico/{id_examen}/{bandera}', function () {
    return redirect('/examenes-gestion');
});