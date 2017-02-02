<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/validar','loginController@validar');
Route::get('/index','loginController@validacion');
Route::get('/registrarse','loginController@registro');

Route::resource('producto','tiendaController');
Route::get('/tienda','tiendaController@listar');
Route::get('/ProdProv','tiendaController@poCadaProveedor');
Route::get('/menu', 'tiendaController@menu');
Route::get('/modificar', 'tiendaController@elegir');
Route::get('/borrar/{id}', 'tiendaController@destroy');
Route::post('/store','tiendaController@store');
Route::post('/update','tiendaController@update');


Route::resource('proveedor','proveedorController');
Route::get('/proveedores','ProveedorController@index');
Route::get('/modificarP', 'ProveedorController@elegirP');
Route::get('/ProdProv', 'proveedorController@porCadaProveedor');
Route::get('/ConsultaProveedores', 'proveedorController@ConsultaProveedores');
Route::get('/borrarP/{id}', 'proveedorController@destroy');
Route::post('/storeP','proveedorController@store');
Route::post('/updateP','proveedorController@update');

Route::get('/venta','compraController@index');
Route::get('/comprar','compraController@elegir');
Route::get('/confirmar','compraController@comprar');
Route::get('/aceptar','compraController@store');


Route::get('/', function () {
    return view('welcome');
});
