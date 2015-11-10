<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */



Route::get('/inicio', ['uses' => 'InicioController@index', 'as' => 'home']);

Route::get('/', ['uses' => 'Auth\AuthController@getLogin', 'as' => 'login']);
// Authentication routes...
Route::get('auth/login', ['uses' => 'Auth\AuthController@getLogin', 'as' => 'login']);
Route::get('login', ['uses' => 'Auth\AuthController@getLogin', 'as' => 'login']);
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('salir', ['uses' => 'Auth\AuthController@getLogout', 'as' => 'logout']);

// Registration routes...
Route::get('registro', ['uses' => 'Auth\AuthController@getRegister', 'as' => 'register']);
Route::post('registro', 'Auth\AuthController@postRegister');


// Password reset link request routes...
Route::get('password/email', ['uses' => 'Auth\PasswordController@getEmail', 'as' => 'forgotpassword']);
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', ['uses' => 'Auth\PasswordController@getReset', 'as' => 'resetpassword']);
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::resource('videopost', 'PostVideoController');
Route::controller('videopostcon', 'PostVideoController');
