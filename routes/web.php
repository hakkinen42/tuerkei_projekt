<?php

use Illuminate\Support\Facades\Route;

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


Route::resource('sehen', 'SehenController');
Route::resource('comment', 'CommentController');
Route::resource('post', 'PostController');
Route::resource('user', 'UserController');
Route::resource('reply', 'ReplyController');


Route::get('/', function () {
    return view('startseite');
});

Route::get('/galerie', function () {
    return view('galerie');
});

Route::get('/impressum', function () {
    return view('impressum');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');