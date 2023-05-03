<?php

use App\Http\Controllers\ArticulosCompradosController;
use App\Http\Controllers\PedidoController;
use App\Models\Articulos_comprados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/** Importar el controlodaro para añadirlo a la ruta */
use App\Http\Controllers\ClienteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(ClienteController::class)->group(function () {
    Route::get('cliente/get', 'index');
    Route::post('/cliente/post', 'store');
    Route::delete('/cliente/delete/{id}', 'destroy');
    Route::put('/cliente/update/{id}', 'update');
});

Route::controller(ArticulosCompradosController::class)->group(function () {
    Route::get('/articulo/get', 'index');
    Route::post('/articulo/post', 'store');
    Route::delete('/articulo/delete/{id}', 'destroy');
    Route::put('/articulo/update/{id}', 'update');
});



Route::controller(PedidoController::class)->group(function() {
    Route::get('pedido/get', 'index');
    Route::post('/pedido/post', 'store');
    Route::delete('/pedido/delete/{id}', 'destroy');
    Route::put('/pedido/update/{id}', 'update');
});