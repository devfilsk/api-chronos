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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('refresh', 'Api\AuthController@refresh');
Route::name('api.login')->post('login', 'Api\AuthController@login');

Route::post('user', 'Api\UserController@store');

Route::group(['middleware' => ['auth:api', 'jwt.refresh', 'tenant', 'bindings']], function (){

    Route::resource('user', 'Api\UserController', ['except' => ['create', 'edit', 'index']]);
    Route::resource('cronogramas', 'Api\CronogramaController', ['except' => ['create', 'edit']]);
    Route::resource('disciplinas', 'Api\DisciplinaController', ['except' => ['create', 'edit']]);
    Route::resource('assuntos', 'Api\AssuntoController', ['except' => ['create', 'edit']]);
    Route::resource('revisoes', 'Api\RevisaoController', ['except' => ['create', 'edit']]);
    Route::resource('materiais', 'Api\MaterialController', ['except' => ['create', 'edit']]);
    Route::resource('exercicios', 'Api\ExercicioController', ['except' => ['create', 'edit']]);

    Route::get('cronograma/completos', 'Api\CronogramaController@getAllWithRelations');
    Route::get('cronograma-completo/{uuid}', 'Api\CronogramaController@showFullCronograma');

    Route::post('logout', 'Api\AuthController@logout');

});


