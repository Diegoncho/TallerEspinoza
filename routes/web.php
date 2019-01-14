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
Route::get('logout', 'Auth\LoginController@logout');

/* Funciones del Formulario */
Route::post('login', 'Auth\LoginController@login')->name('login');


Route::post('logout', 'Auth\LoginController@logout')->name('logout');
/*---------------------------------------*/


/*---------------------------------------*/
/* Menu de Aplicacion */
Route::get('menu', 'MenuController@index')->name('menu');
Route::get('submenu', 'MenuController@index2')->name('submenu');
Route::get('submenuAdd', 'MenuController@index3')->name('submenuAdd');
Route::get('submenuRepo', 'MenuController@index4')->name('submenuRepo');
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

/* Vista de Reporte Cliente */
Route::get('/clienteView/{id}', function($id){
    return view('clienteView');
});
Route::get('/clienteView/{id}', 'ClienteController@view')->name('clienteView');

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

/* Vista de Reporte Proveedor */
Route::get('/proveedorView/{id}', function($id){
    return view('proveedorView');
});
Route::get('/proveedorView/{id}', 'ProveedorController@view')->name('proveedorView');

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

/* Vista de Reporte Producto */
Route::get('/productoView/{id}', function($id){
    return view('productoView');
});
Route::get('/productoView/{id}', 'ProductoController@view')->name('productoView');

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

/* Vista de Reporte Vehiculo */
Route::get('/vehiculoView/{id}', function($id){
    return view('vehiculoView');
});
Route::get('/vehiculoView/{id}', 'VehiculoController@view')->name('vehiculoView');

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

/* Vista de Reporte Transporte */
Route::get('/transporteView/{id}', function($id){
    return view('transporteView');
});
Route::get('/transporteView/{id}', 'TransporteController@view')->name('transporteView');

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

/* Vista de Reporte Mecanica */
Route::get('/mecanicaView/{id}', function($id){
    return view('mecanicaView');
});
Route::get('/mecanicaView/{id}', 'MecanicaController@view')->name('mecanicaView');

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


//CRUD DE MODELOS//
/*---------------------------------------*/
/* Listar Modelos */
Route::get('/modelo', function(){
    return view('modelo');
});
Route::get('modelo', 'ModeloController@index')->name('modelo');

/* Formulario de Registrar Modelo */
Route::get('/modeloAdd', function(){
    return view('modeloAdd');
});
Route::get('modeloAdd', 'ModeloController@create')->name('modeloAdd');

/* Formulario de Editar Modelo */
Route::get('/modeloEdit/{id}', function($id){
    return view('modeloEdit');
});
Route::get('/modeloEdit/{id}', 'ModeloController@edit')->name('modeloEdit');


/* Agregar Modelo */
Route::post('/modeloAdd', 'ModeloController@post');

/* Editar Modelo */
Route::put('/modeloEdit/{id}', 'ModeloController@put');

/* Eliminar Modelo */
Route::delete('/modelo/{id}', 'ModeloController@delete');
/*---------------------------------------*/


//CRUD DE PMARCAS//
/*---------------------------------------*/
/* Listar Pmarcas */
Route::get('/pmarca', function(){
    return view('pmarca');
});
Route::get('pmarca', 'PmarcaController@index')->name('pmarca');

/* Formulario de Registrar Pmarca */
Route::get('/pmarcaAdd', function(){
    return view('pmarcaAdd');
});
Route::get('pmarcaAdd', 'PmarcaController@create')->name('pmarcaAdd');

/* Formulario de Editar Pmarca */
Route::get('/pmarcaEdit/{id}', function($id){
    return view('pmarcaEdit');
});
Route::get('/pmarcaEdit/{id}', 'PmarcaController@edit')->name('pmarcaEdit');


/* Agregar Pmarca */
Route::post('/pmarcaAdd', 'PmarcaController@post');

/* Editar Pmarca */
Route::put('/pmarcaEdit/{id}', 'PmarcaController@put');

/* Eliminar Pmarca */
Route::delete('/pmarca/{id}', 'PmarcaController@delete');
/*---------------------------------------*/


//CRUD DE VMARCAS//
/*---------------------------------------*/
/* Listar Vmarcas */
Route::get('/vmarca', function(){
    return view('vmarca');
});
Route::get('vmarca', 'VmarcaController@index')->name('vmarca');

/* Formulario de Registrar Vmarca */
Route::get('/vmarcaAdd', function(){
    return view('vmarcaAdd');
});
Route::get('vmarcaAdd', 'VmarcaController@create')->name('vmarcaAdd');

/* Formulario de Editar Vmarca */
Route::get('/vmarcaEdit/{id}', function($id){
    return view('vmarcaEdit');
});
Route::get('/vmarcaEdit/{id}', 'VmarcaController@edit')->name('vmarcaEdit');


/* Agregar Vmarca */
Route::post('/vmarcaAdd', 'VmarcaController@post');

/* Editar Vmarca */
Route::put('/vmarcaEdit/{id}', 'VmarcaController@put');

/* Eliminar Vmarca */
Route::delete('/vmarca/{id}', 'VmarcaController@delete');
/*---------------------------------------*/


//CRUD DE COMPRAS//
/*---------------------------------------*/
/* Listar Compras */
Route::get('/compra', function(){
    return view('compra');
});
Route::get('compra', 'CompraController@index')->name('compra');

/* Formulario de Registrar Compras */
Route::get('/compraAdd', function(){
    return view('compraAdd');
});
Route::get('compraAdd', 'CompraController@create')->name('compraAdd');

/* Vista de Reporte Compras */
Route::get('/compraView/{id}', function($id){
    return view('compraView');
});
Route::get('/compraView/{id}', 'CompraController@view')->name('compraView');


/* Agregar Compras */
Route::post('/compraAdd', 'CompraController@post');

/* Eliminar Compras */
Route::delete('/compra/{id}', 'CompraController@delete');
/*---------------------------------------*/


//CRUD DE FACTURAS//
/*---------------------------------------*/
/* Listar Facturas */
Route::get('/factura', function(){
    return view('factura');
});
Route::get('factura', 'ComprobanteController@index')->name('factura');

/* Formulario de Registrar Factura */
Route::get('/facturaAdd', function(){
    return view('facturaAdd');
});
Route::get('facturaAdd', 'ComprobanteController@create')->name('facturaAdd');

/* Formulario de Detalle Factura */
Route::get('/facturaDetail/{id}', function($id){
    return view('facturaDetail');
});
Route::get('/facturaDetail/{id}', 'ComprobanteController@detail')->name('facturaDetail');

/* Vista de Reporte Factura */
Route::get('/facturaPdf/{id}', function($id){
    return view('facturaPdf');
});
Route::get('/facturaPdf/{id}', 'ComprobanteController@pdf')->name('facturaPdf');


/* Agregar Factura */
Route::post('/facturaAdd', 'ComprobanteController@post');


/* Datos para EasyAutocomplete */
Route::get('factura/findClient', 'ComprobanteController@findClient');
Route::get('factura/findProduct', 'ComprobanteController@findProduct');
/*---------------------------------------*/


//CRUD DE MFACTURAS//
/*---------------------------------------*/
/* Listar Mfacturas */
Route::get('/Mfactura', function(){
    return view('Mfactura');
});
Route::get('Mfactura', 'McomprobanteController@index')->name('Mfactura');

/* Formulario de Registrar Mfactura */
Route::get('/MfacturaAdd', function(){
    return view('MfacturaAdd');
});
Route::get('MfacturaAdd', 'McomprobanteController@create')->name('MfacturaAdd');

/* Formulario de Detalle Mfactura */
Route::get('/MfacturaDetail/{id}', function($id){
    return view('MfacturaDetail');
});
Route::get('/MfacturaDetail/{id}', 'McomprobanteController@detail')->name('MfacturaDetail');

/* Vista de Reporte Mfactura */
Route::get('/MfacturaPdf/{id}', function($id){
    return view('MfacturaPdf');
});
Route::get('/MfacturaPdf/{id}', 'McomprobanteController@pdf')->name('MfacturaPdf');


/* Agregar Mfactura */
Route::post('/MfacturaAdd', 'McomprobanteController@post');


/* Datos para EasyAutocomplete */
Route::get('Mfactura/findClient', 'McomprobanteController@findClient');
Route::get('Mfactura/findMecanica', 'McomprobanteController@findMecanica');
/*---------------------------------------*/


