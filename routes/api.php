<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('proveedores', App\Http\Controllers\API\proveedoresAPIController::class);

Route::resource('detalle_pedidos', App\Http\Controllers\API\detalle_pedidoAPIController::class);

Route::resource('conf_empresas', App\Http\Controllers\API\conf_empresaAPIController::class);

Route::resource('pedidos', App\Http\Controllers\API\pedidoAPIController::class);

Route::resource('devolucions', App\Http\Controllers\API\devolucionAPIController::class);

Route::resource('detalle_recepcions', App\Http\Controllers\API\detalle_recepcionAPIController::class);

Route::resource('estado_productos', App\Http\Controllers\API\estado_productoAPIController::class);

Route::resource('clientes', App\Http\Controllers\API\clienteAPIController::class);

Route::resource('productos', App\Http\Controllers\API\productoAPIController::class);

Route::resource('inv_productos', App\Http\Controllers\API\inv_productoAPIController::class);

Route::resource('producto_devolucions', App\Http\Controllers\API\producto_devolucionAPIController::class);