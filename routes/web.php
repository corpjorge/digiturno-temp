<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::resource('turnero', 'Digiturno\TurneroController')->names(['index' => 'turnero'])->except(['edit']);
Route::post('turnero/create/servicio', 'Digiturno\TurneroController@servicio')->name('turnero.servicio');
Route::post('turnero/create/turno', 'Digiturno\TurneroController@createTurno')->name('turnero.crear');
//Ruta para obtener las publicidades
Route::post('turnero/publicidades', 'Digiturno\TurneroController@getPublicidad');
//Ruta para obtener los turnos
Route::post('turnero/turnos', 'Digiturno\TurneroController@getTurnos');

Route::group(['middleware' => 'auth'], function () {

    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	
	Route::resource('categorias', 'Digiturno\ServicioCategoriaController')->names([
    	'index' => 'categorias',
    	/*'create' => 'categorias.create',
    	'edit' => 'categorias.edit',
    	'update' => 'categorias.update',
    	'destroy' => 'categorias.destroy',*/
	]);//->middleware('administrador');

	Route::resource('servicios', 'Digiturno\ServicioController')->names(['index' => 'servicios']);//->middleware('administrador');
	Route::resource('modulos', 'Digiturno\ModuloController')->names(['index' => 'modulos']);//->middleware('administrador');
	//Ruta para trasladar el turno
	Route::put('turnos/trasladar/{id}', 'Digiturno\TurnoController@trasladar')->name('turnos.trasladar');
	//Ruta para finalizar el turno
	Route::put('turnos/noatendido/{id}', 'Digiturno\TurnoController@noatendido')->name('turnos.noatendido');
	Route::resource('turnos', 'Digiturno\TurnoController')->names(['index' => 'turnos']);//->middleware('administrador');
	//Publicidades
	Route::resource('publicidad', 'PublicidadController')->names(['index' => 'publicidad']);
});