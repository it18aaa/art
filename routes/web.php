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

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/ims', 'IMSController@index')->middleware('auth')->middleware('requirerole:ims');
Route::get('/cms', 'CMSController@index')->middleware('auth')->middleware('requirerole:cms');
Route::get('/member', 'MemberController@index')->middleware('auth')->middleware('requirerole:member');
