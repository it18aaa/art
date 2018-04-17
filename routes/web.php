<?php

// routes for the front end website

Route::get('/', 'GalleryController@splashPage');
Route::get('/gallery', 'GalleryController@browsePage');

Route::get('/gallery/{input}', 'GalleryController@browser')
    ->name('gallery');

Route::get('/artwork/{id}', 'GalleryController@artwork');
Route::get('/about', 'GalleryController@about');

Auth::routes();
Route::get('/loguserout', 'Auth\LoginController@logout');
