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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');
Route::get('/posts', 'PostsController@index')->middleware('auth')->name('posts');
Route::post('/posts', 'PostsController@store')->middleware('auth')->name('posts.store');
Route::get('/posts/create', 'PostsController@create')->middleware('auth')->name('posts.create');
Route::get('/posts/{post}', 'PostsController@show')->middleware('auth')->name('posts.show');
Route::put('/posts/{post}', 'PostsController@update')->middleware('auth')->name('posts.update');
Route::get('/posts/{post}/edit', 'PostsController@edit')->middleware('auth')->name('posts.edit');
Route::delete('/posts/{post}', 'PostsController@delete')->middleware('auth')->name('posts.delete');
Route::post('/posts/{post}', 'CommentsController@store')->middleware('auth')->name('comment.store');
Route::delete('/posts/{post}/{comment}', 'CommentsController@delete')->middleware('auth')->name('comment.delete');



