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

// Send reset password mail
//Route::post('reset-password', 'Api\AuthController@sendPasswordResetLink');
Route::post('email-reset-password', 'Api\ResetPasswordController@sendEmail');
Route::post('reset-password', 'Api\Auth\ChangePasswordController@process');

// handle reset password form process
Route::post('reset/password', 'Api\AuthController@callResetPassword');

Route::post('user', 'Api\UserController@store');

Route::group(['middleware' => ['auth:api', 'jwt.refresh', 'tenant', 'bindings']], function (){

    Route::resource('users', 'Api\UserController', ['except' => ['create', 'edit', 'index']]);
    Route::resource('cronogramas', 'Api\CronogramaController', ['except' => ['create', 'edit']]);
    Route::resource('disciplinas', 'Api\DisciplinaController', ['except' => ['create', 'edit']]);
    Route::resource('assuntos', 'Api\AssuntoController', ['except' => ['create', 'edit']]);
    Route::resource('artefatos/revisao', 'Api\RevisaoController', ['except' => ['create', 'edit']]);
    Route::resource('artefatos/material', 'Api\MaterialController', ['except' => ['create', 'edit']]);
    Route::resource('artefatos/exercicio', 'Api\ExercicioController', ['except' => ['create', 'edit']]);
    Route::resource('artefatos', 'Api\ArtefatoController', ['except' => ['create', 'edit']]);

    Route::get('cronograma/completos', 'Api\CronogramaController@getAllWithRelations');
    Route::get('cronograma-completo/{uuid}', 'Api\CronogramaController@showFullCronograma');

    Route::post('logout', 'Api\AuthController@logout');

});


