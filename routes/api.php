<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(ClienteController::class)->group(function(){
    Route::post('nuevoCliente', 'newClient');
});


Route::controller(ClienteController::class)->group(function(){
    Route::get('client', 'getClientes');
});

Route::controller(ClienteController::class)->group(function(){
    Route::get('todo', 'getTodo');
});

Route::controller(ClienteController::class)->group(function(){
    Route::put('status', 'updateStatus');
});

Route::controller(ClienteController::class)->group(function(){
    Route::get('numero', 'getPhoneNumberByFolio');
});