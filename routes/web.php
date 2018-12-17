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
Route::get('submenu', 'MenuController@index2')->name('submenu');
Route::get('submenuAdd', 'MenuController@index3')->name('submenuAdd');
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

/* Vista de Reporte Empleado */
Route::get('/empleadoView/{id}', function($id){
    return view('empleadoView');
});
Route::get('/empleadoView/{id}', 'EmpleadoController@view')->name('empleadoView');

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

/* Editar Cliente */
Route::put('/clienteEdit/{id}', 'ClienteController@put');

/* Eliminar Cliente */
Route::delete('/cliente/{id}', 'ClienteController@delete');
/*---------------------------------------*/


//CRUD DE PROVEEDORES//
/*---------------------------------------*/
/* Listar Proveedores */
Route::get('/proveedor', function(){
    return view('proveedor');
});
Route::get('proveedor', 'ProveedorController@index')->name('proveedor');

/* Formulario de Registrar Proveedor */
Route::get('/proveedorAdd', function(){
    return view('proveedorAdd');
});
Route::get('proveedorAdd', 'ProveedorController@create')->name('proveedorAdd');

/* Formulario de Editar Proveedor */
Route::get('/proveedorEdit/{id}', function($id){
    return view('proveedorEdit');
});
Route::get('/proveedorEdit/{id}', 'ProveedorController@edit')->name('proveedorEdit');


/* Agregar Proveedor */
Route::post('/proveedorAdd', 'ProveedorController@post');

/* Editar Proveedor */
Route::put('/proveedorEdit/{id}', 'ProveedorController@put');

/* Eliminar Proveedor */
Route::delete('/proveedor/{id}', 'ProveedorController@delete');
/*---------------------------------------*/


//CRUD DE PRODUCTOS//
/*---------------------------------------*/
/* Listar Productos */
Route::get('/producto', function(){
    return view('producto');
});
Route::get('producto', 'ProductoController@index')->name('producto');

/* Formulario de Registrar Producto */
Route::get('/productoAdd', function(){
    return view('productoAdd');
});
Route::get('productoAdd', 'ProductoController@create')->name('productoAdd');

/* Formulario de Editar Producto */
Route::get('/productoEdit/{id}', function($id){
    return view('productoEdit');
});
Route::get('/productoEdit/{id}', 'ProductoController@edit')->name('productoEdit');


/* Agregar Producto */
Route::post('/productoAdd', 'ProductoController@post');

/* Editar Producto */
Route::put('/productoEdit/{id}', 'ProductoController@put');

/* Eliminar Producto */
Route::delete('/producto/{id}', 'ProductoController@delete');
/*---------------------------------------*/


//CRUD DE VEHICULOS//
/*---------------------------------------*/
/* Listar Vehiculos */
Route::get('/vehiculo', function(){
    return view('vehiculo');
});
Route::get('vehiculo', 'VehiculoController@index')->name('vehiculo');

/* Formulario de Registrar Vehiculo */
Route::get('/vehiculoAdd', function(){
    return view('vehiculoAdd');
});
Route::get('vehiculoAdd', 'VehiculoController@create')->name('vehiculoAdd');

/* Formulario de Editar Vehiculo */
Route::get('/vehiculoEdit/{id}', function($id){
    return view('vehiculoEdit');
});
Route::get('/vehiculoEdit/{id}', 'VehiculoController@edit')->name('vehiculoEdit');


/* Agregar Vehiculo */
Route::post('/vehiculoAdd', 'VehiculoController@post');

/* Editar Vehiculo */
Route::put('/vehiculoEdit/{id}', 'VehiculoController@put');

/* Eliminar Vehiculo */
Route::delete('/vehiculo/{id}', 'VehiculoController@delete');
/*---------------------------------------*/


//CRUD DE TRANSPORTES//
/*---------------------------------------*/
/* Listar Transportes */
Route::get('/transporte', function(){
    return view('transporte');
});
Route::get('transporte', 'TransporteController@index')->name('transporte');

/* Formulario de Registrar Transporte */
Route::get('/transporteAdd', function(){
    return view('transporteAdd');
});
Route::get('transporteAdd', 'TransporteController@create')->name('transporteAdd');

/* Formulario de Editar Transporte */
Route::get('/transporteEdit/{id}', function($id){
    return view('transporteEdit');
});
Route::get('/transporteEdit/{id}', 'TransporteController@edit')->name('transporteEdit');


/* Agregar Transporte */
Route::post('/transporteAdd', 'TransporteController@post');

/* Editar Transporte */
Route::put('/transporteEdit/{id}', 'TransporteController@put');

/* Eliminar Transporte */
Route::delete('/transporte/{id}', 'TransporteController@delete');
/*---------------------------------------*/


//CRUD DE MECANICAS//
/*---------------------------------------*/
/* Listar Mecanicas */
Route::get('/mecanica', function(){
    return view('mecanica');
});
Route::get('mecanica', 'MecanicaController@index')->name('mecanica');

/* Formulario de Registrar Mecanica */
Route::get('/mecanicaAdd', function(){
    return view('mecanicaAdd');
});
Route::get('mecanicaAdd', 'MecanicaController@create')->name('mecanicaAdd');

/* Formulario de Editar Mecanica */
Route::get('/mecanicaEdit/{id}', function($id){
    return view('mecanicaEdit');
});
Route::get('/mecanicaEdit/{id}', 'MecanicaController@edit')->name('mecanicaEdit');


/* Agregar Mecanica */
Route::post('/mecanicaAdd', 'MecanicaController@post');

/* Editar Mecanica */
Route::put('/mecanicaEdit/{id}', 'MecanicaController@put');

/* Eliminar Mecanica */
Route::delete('/mecanica/{id}', 'MecanicaController@delete');
/*---------------------------------------*/