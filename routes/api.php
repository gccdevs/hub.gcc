<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/form/result', 'FormController@show');
Route::post('/form/purchase','FormController@purchase');
Route::post('/form/validate','FormController@validateEmail');


Route::post('/register','Auth\RegisterController@register');
Route::post('/register/validate','Auth\RegisterController@validateEmail');
Route::post('/login','Auth\LoginController@login');
Route::post('/logout','Auth\LoginController@logout');
Route::post('/token/refresh','Auth\LoginController@refresh');

Route::get('/user/list','ProfileController@show');
Route::post('/user/profile/update','ProfileController@update');
Route::post('/user/password/update','PasswordController@update');