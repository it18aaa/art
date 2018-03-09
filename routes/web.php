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

Route::get('/', 'GalleryController@indexPage');
Route::get('/artwork/{id}', 'GalleryController@artwork');
Route::get('/about', 'GalleryController@about');


Auth::routes();

<<<<<<< HEAD
Route::get('/home', 'HomeController@index')->name('home');
=======
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
>>>>>>> 9703886b975a8c540897dc176e0f7a058e13d2c3
