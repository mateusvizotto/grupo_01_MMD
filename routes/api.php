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
    Route::post('/animal-do-zoologico', 'show_animal_zoologico');#Mostar os animais filtrados por zoológico

    Route::post('/alimento', 'store_alimentos');
    Route::get('/alimento', 'show_alimentos');
    Route::post('/alimento-animal', 'show_alimentos_animal');#relaciona o animal a alimento
    Route::post('/animais-consumo-alimento', 'show_animais_consumo_alimento');#animais que se alimentam de um alimento
    Route::post('/alimento-consumidos-animais', 'show_alimento_consumidos_animais');#alimentos que alimentam um animal

    Route::post('/funcionario', 'store_funcionario');
    Route::get('/funcionario', 'show_funcionario');
    Route::post('/funcionario-do-zoologico', 'show_funcionario_zoologico');#Mostar os funcionarios filtrados por zoológico

    Route::post('/jaula', 'store_jaula');
    Route::get('/jaula', 'show_jaula');
    Route::post('/jaula-do-zoologico', 'show_jaula_zoologico');#Mostar as jaulas filtrados por zoológico
});
