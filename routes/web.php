<?php

use Illuminate\Support\Facades\Route;

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

Route::get('login/{usuario}/{pass}', ['uses' => 'UsuariosController@login']);

Route::get('traer1', ['uses' => 'ProductosController@obtenerProductos']);
Route::get('traer/{id}', ['uses' => 'ProductosController@getProductos']);
Route::get('actualizar/{id}/{descripcion}/{precio_venta}/{costo}/{departamento}/{categoria}', 
                        ['uses' => 'ProductosController@updateProductos']);
Route::get('eliminar/{id}', ['uses' => 'ProductosController@eliminar']);
Route::get('insertar/{descripcion}/{precio_venta}/{costo}/{departamento}/{categoria}',
                        ['uses' => 'ProductosController@insertar']);