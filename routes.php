<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*---------
 |Inicio
 ----------*/
Route::get('/','InicioController@getIndex');

/*---------
 |Servicios
 ----------*/
Route::controller('login','LoginController');

/*---------
 |Programas
 ----------*/
Route::controller('programas','ProgramasController');

/*---------
 |Calendario
 ----------*/
Route::get('calendario/inicio','CalendarioController@getCalendario');

/*---------
 |Comunidad
 ----------*/
Route::get('comunidad/egresadosuba','ComunidadController@getEgresados');

/*---------
 |Noticias
 ----------*/
Route::get('noticias/actuales','NoticiasController@getActuales');
Route::get('noticias/eventos','NoticiasController@getEventos');

/*---------
 |RUTAS PROTEGIDAS POR FILTRO DE SESION
 ----------*/
Route::group(array('before' => 'session_participante'), function(){
	//Ruta de pagina de inicio
	Route::get('inicio', array('as' => 'inicio', 'uses' => 'InicioController@getIndex'));

	//Ruta para las funciones del participante
	Route::controller('participante','ParticipanteController');
});

/*---------
 |RUTAS PROTEGIDAS POR FILTRO DE SESION
 ----------*/
Route::group(array('before' => 'session_facilitador'), function(){
	//Ruta de pagina de inicio
	Route::get('inicio', array('as' => 'inicio', 'uses' => 'InicioController@getIndex'));

	//Ruta para las funciones del facilitador
	Route::controller('facilitador','FacilitadorController');
});

/*---------
 |RUTAS PROTEGIDAS POR FILTRO DE SESION
 ----------*/
Route::group(array('before' => 'session_dace'), function(){
	//Ruta de pagina de inicio
	Route::get('inicio', array('as' => 'inicio', 'uses' => 'InicioController@getIndex'));

	//Ruta para las funciones de dace
	Route::get('dace/graduandos-sabana/{promocion}',function($promocion){
		return Response::download(public_path().'/Sabana_Calificaciones_UBA_Postgrado_Promocion_'.$promocion.'.csv');
	});
	Route::controller('dace','DaceController');
	Route::controller('informatica','InformaticaController');
});

/*---------
 |RUTAS PROTEGIDAS POR FILTRO DE SESION
 ----------*/
Route::group(array('before' => 'session_administrativa'), function(){
	//Ruta de pagina de inicio
	Route::get('inicio', array('as' => 'inicio', 'uses' => 'InicioController@getIndex'));

	//Ruta para las funciones administrativa
	Route::controller('administrativa','AdministrativaController');
});
