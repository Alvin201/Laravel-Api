<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

//NON POSTMAN
Route::get('/form','CommentController@form'); //form
Route::get('/nonpostmancomments','CommentController@showform');//action
Route::post('/nonpostmancomments/storeform','CommentController@storeform');
Route::post('/nonpostmancomments/updateform','CommentController@updateform');
Route::post('/nonpostmancomments/destroyform','CommentController@destroyform');
Route::get('/nonpostmancomments/pagingform','CommentController@pagingform');


