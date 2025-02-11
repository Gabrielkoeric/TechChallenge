<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\ClienteConsultaController;
use App\Http\Controllers\Api\ProdutoController;

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
//consulta de usuarios
Route::get('/users', [UserController::class, 'index']);
//cadastro de cliente
Route::post('/cliente', [ClienteController::class, 'store']);
//consulta de usuario por cpf
Route::get('/clientes/{cpf}', [ClienteConsultaController::class, 'consultarPorCpf']);
//inserção, alteração e exclusão de produto
Route::post('produtos', [ProdutoController::class, 'create']);
Route::put('produtos/{id_produto}', [ProdutoController::class, 'update']);
Route::delete('produtos/{id_produto}', [ProdutoController::class, 'delete']);

