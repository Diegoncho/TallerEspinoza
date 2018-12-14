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

/*----------------------------------------*/
 /* Formulario Login de Aplicacion */
Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('login', 'Auth\LoginController@showLoginForm');

/* Funciones del Formulario */
Route::post('login', 'Auth\LoginController@login')->name('login');


Route::post('logout', 'Auth\LoginController@logout')->name('logout');

/*---------------------------------------*/


/*---------------------------------------*/
/* Menu de Aplicacion */
Route::get('menu', 'MenuController@index')->name('menu');

/*---------------------------------------*/

//CRUD DE EMPLEADOS//
/*---------------------------------------*/
/* Listar Empleados */
Route::get('/empleado', function(){
    return view('empleado');
});
Route::get('empleado', 'EmpleadoController@index')->name('empleado');

/* Formulario de Registrar Empleado */
Route::get('/empleadoAdd', function(){
    return view('empleadoAdd');
});
Route::get('empleadoAdd', 'EmpleadoController@create')->name('empleadoAdd');

/* Formulario de Editar Empleado */
Route::get('/empleadoEdit/{id}', function($id){
    return view('empleadoEdit');
});
Route::get('/empleadoEdit/{id}', 'EmpleadoController@edit')->name('empleadoEdit');


/* Agregar Empleado */
Route::post('/empleadoAdd', 'EmpleadoController@post');

/* Editar Empleado */
Route::put('/empleadoEdit/{id}', 'EmpleadoController@put');

/* Eliminar Empleado */
Route::delete('/empleado/{id}', 'EmpleadoController@delete');
/*---------------------------------------*/


//CRUD DE CLIENTES//
/*---------------------------------------*/
/* Listar Clientes */
Route::get('/cliente', function(){
    return view('cliente');
});
Route::get('cliente', 'ClienteController@index')->name('cliente');

/* Formulario de Registrar Cliente */
Route::get('/clienteAdd', function(){
    return view('clienteAdd');
});
Route::get('clienteAdd', 'ClienteController@create')->name('clienteAdd');

/* Formulario de Editar Cliente */
Route::get('/clienteEdit/{id}', function($id){
    return view('clienteEdit');
});
Route::get('/clienteEdit/{id}', 'ClienteController@edit')->name('clienteEdit');


/* Agregar Cliente */
Route::post('/clienteAdd', 'ClienteController@post');

/* Editar Empleado */
Route::put('/clienteEdit/{id}', 'ClienteController@put');

/* Eliminar Cliente */
Route::delete('/cliente/{id}', 'ClienteController@delete');
/*---------------------------------------*/