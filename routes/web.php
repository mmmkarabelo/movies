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


/*
Route::get('/hello' , function(){
    return '<h1>Hello World</h1>';
});
*/

/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'PagesController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('movies' , 'MoviesController');

Route::resource('posts' , 'PostsController');


Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
