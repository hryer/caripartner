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

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::post('signup',[
    'uses' => 'UsersController@postSignUp',
    'as' => 'signup'
]);

Route::post('signin',[
    'uses' => 'UsersController@postSignIn',
    'as' => 'signin'
]);

Route::get('/dashboard',[
    'uses' => 'UsersController@getDashboard',
    'as' => 'dashboard',
    'middleware' => 'auth'
]);


