<?php

// routes for the front end website

Route::get('/', 'GalleryController@splashPage');
Route::get('/gallery', 'GalleryController@browsePage');

Route::get('/artwork/{id}', 'GalleryController@artwork');
Route::get('/about', 'GalleryController@about');

Auth::routes();
Route::get('/loguserout', 'Auth\LoginController@logout');

/*
Route::get('/cms/artwork/descriptions', 'ArtworkController@descriptionsList')
    ->middleware('auth')->middleware('requirerole:cms');
Route::get('/cms/artwork/description/{id}', 'ArtworkController@descriptionsForm')
    ->middleware('auth')->middleware('requirerole:cms');
Route::post('/cms/artwork/updateDescription', 'ArtworkController@descriptionsUpdate')
    ->middleware('auth')->middleware('requirerole:cms');

Route::resource('artworks', 'ArtworkController');
Route::resource('customers', 'CustomerController');
Route::resource('artists', 'ArtistController');
*/



//Route::get('/home', 'HomeController@index')
//    ->name('home')->middleware('auth');
/*  old... kept for reference!

Route::get('/ims', 'IMSController@index')
    ->middleware('auth')->middleware('requirerole:ims');

Route::get('/cms', 'CMSController@index')
    ->middleware('auth')->middleware('requirerole:cms');



*/
