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

Route::get('/', 'GalleryController@splashPage');
Route::get('/gallery', 'GalleryController@browsePage');

Route::get('/artwork/{id}', 'GalleryController@artwork');
Route::get('/about', 'GalleryController@about');

Route::resource('artworks', 'ArtworkController');

Route::get('/cms/artwork/descriptions', 'ArtworkController@descriptionsList')
    ->middleware('auth')->middleware('requirerole:cms');
Route::get('/cms/artwork/description/{id}', 'ArtworkController@descriptionsForm')
    ->middleware('auth')->middleware('requirerole:cms');
Route::post('/cms/artwork/updateDescription', 'ArtworkController@descriptionsUpdate')
    ->middleware('auth')->middleware('requirerole:cms');


Route::resource('customers', 'CustomerController');
Route::resource('artists', 'ArtistController');

Auth::routes();

//Route::get('/home', 'HomeController@index')
//    ->name('home')->middleware('auth');

Route::get('/ims', 'IMSController@index')
    ->middleware('auth')->middleware('requirerole:ims');

Route::get('/cms', 'CMSController@index')
    ->middleware('auth')->middleware('requirerole:cms');

Route::get('/loguserout', 'Auth\LoginController@logout');
