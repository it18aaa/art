<?php

Route::middleware(['auth', 'requirerole:cms'])->group(function() {

    Route::get('/', "CMS\HomeController@index")
        ->name('cms.index');
    
    Route::name('cms.')->group(function() {

        Route::get('artworks/index', 'CMS\ArtworkController@index')
            ->name('artworks.index');

        Route::get('artworks/{artwork}/edit', 'CMS\ArtworkController@edit')
            ->name('artworks.edit');

        Route::put('artworks/{artwork}/tag', 'CMS\ArtworkController@tag')
            ->name('artworks.tag');

        Route::delete('artworks/{artwork}/tag', 'CMS\ArtworkController@untag')
            ->name('artworks.untag');

        Route::put('artworks/{artwork}/image', 'CMS\ArtworkController@addImage')
            ->name('artworks.addImage');
            
        Route::put('artworks/{artwork}/description', 'CMS\ArtworkController@description')
            ->name('artworks.description');        

        Route::get('artists/index', 'CMS\ArtistController@index')
            ->name('artists.index');

        Route::get('artists/{artist}/edit', 'CMS\ArtistController@edit')
            ->name('artists.edit');
    

        Route::put('artists/{artist}/image', 'CMS\ArtistController@addImage')
            ->name('artists.addImage');

        Route::put('artists/{artist}/bio', 'CMS\ArtistController@bio')
            ->name('artists.bio');


    });
});



