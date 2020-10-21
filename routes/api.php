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
Route::group(['namespace' => 'Auth'], function () {
    Route::get('register', 'RegisterController@register'); 
    Route::post('register', 'RegisterController@save');  
    Route::get('login', 'LoginController@login'); 
    Route::post('login', 'LoginController@post');    
});

Route::get('post', 'PostController@index');
Route::post('post', 'PostController@create');
Route::put('post/{id}','PostController@update');
Route::delete('post/{id}', 'PostController@delete');
