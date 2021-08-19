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
    return view('welcome');
});

Route::get('sample', 'SampleController@index')->name('sample');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'PostController@index')->name('post.index');
Route::group(['middleware' => 'auth'], function () {
    Route::get('post/create', 'PostController@create')->name('post.create');
    Route::post('post/create', 'PostController@store')->name('post.store');
    Route::get('post/{id}/show', 'PostController@show')->name('post.show'); 
});