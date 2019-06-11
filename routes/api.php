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

Route::group(['middleware' => 'auth:api'], function (){
    Route::get('users', function (){
        return \App\User::all();
    });

//    Route::resource('cliente', 'ClienteController', ['except' => ['create', 'edit']]);
    Route::post('logout', 'Api\AuthController@logout');

});


Route::name('api.login')->post('login', 'Api\AuthController@login');
