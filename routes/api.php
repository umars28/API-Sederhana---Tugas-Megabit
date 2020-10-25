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
    Route::post('register', 'RegisterController@register');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->middleware('auth:api');
});

Route::group(['prefix' => 'post', 'middleware' => 'auth:api'], function () {
    Route::get('/', 'PostController@index');
    Route::post('/', 'PostController@create');
    Route::post('/update/{id}','PostController@update');
    Route::delete('/delete/{id}', 'PostController@delete');
});
