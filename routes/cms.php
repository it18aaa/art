<?php

Route::middleware(['auth', 'requirerole:cms'])->group(function() {

    Route::get('/', "CMS\HomeController@index")
        ->name('cms.home');
    
    Route::name('cms.')->group(function() {

        Route::get('artworks/index', 'CMS\ArtworkController@index')
            ->name('artworks.index');

        Route::get('artworks/{artwork}/edit', 'CMS\ArtworkController@edit')
            ->name('artworks.edit');

        Route::put('artworks/{artwork}', 'CMS\ArtworkController@update')
            ->name('artworks.update');

        Route::post('artworks/{id}/tag', 'CMS\ArtworkController@tag')
            ->name('artworks.tag');

        Route::post('artworks/{id}/untag', 'CMS\ArtworkController@untag')
            ->name('artworks.untag');

    });
});



