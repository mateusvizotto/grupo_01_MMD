<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZooController;

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

Route::get('team', [TeamController::class, 'index']);

Route::controller(ZooController::class)->group(function(){
    Route::post('/zoologico', 'store_zoologico');
    Route::get('/zoologico', 'show_zoologico');

    Route::post('/animal', 'store_animal');
    Route::get('/animal', 'show_animal');

    Route::post('/alimentos', 'store_alimentos');
    Route::post('/funcionario', 'store_funcionario');

    Route::post('/jaula', 'store_jaula');
});
