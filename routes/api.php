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

//POSTMAN by url
Route::get('postmancomments','CommentController@index');
Route::get('postmancomments/{id}','CommentController@show');
Route::post('/postmancomments/store','CommentController@store');
Route::post('/postmancomments/update/{id}','CommentController@update');
Route::post('/postmancomments/delete/{id}','CommentController@destroy');