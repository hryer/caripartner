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
    'uses' => 'PostController@getDashboard',
    'as' => 'dashboard',
    'middleware' => 'auth'
]);

Route::post('/createpost',[
    'uses' => 'PostController@postCreatePost',
    'as' => 'post.create'
]);

Route::get('/delete-post/{post_id}',[
    'uses' => 'PostController@getDeletePost',
    'as' => 'post.delete',
    'middleware' => 'auth'
]);

Route::post('/edit',[
    'uses' => 'PostController@postEditPost',
    'as' => 'edit'
]);

Route::get('/logout',[
    'uses' => 'UsersController@getLogout',
    'as' => 'logout'
]);