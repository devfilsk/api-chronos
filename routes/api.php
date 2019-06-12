<?php

use Illuminate\Http\Request;

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

Route::post('refresh', 'Api\AuthController@refresh');
Route::name('api.login')->post('login', 'Api\AuthController@login');

Route::group(['middleware' => ['auth:api', 'jwt.refresh']], function (){
    Route::get('users', function (){
        return \App\User::all();
    });

//    Route::resource('cliente', 'ClienteController', ['except' => ['create', 'edit']]);
    Route::post('logout', 'Api\AuthController@logout');

});


