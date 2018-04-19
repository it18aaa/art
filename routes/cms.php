<?php

Route::middleware(['auth', 'requirerole:cms'])->group(function() {

    Route::get('/', "CMS\HomeController@index")
        ->name('cms.index');
    
    Route::name('cms.')->group(function() {

        // Artwork routes
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


        // Artist Routes 
        Route::get('artists/index', 'CMS\ArtistController@index')
            ->name('artists.index');

        Route::get('artists/{artist}/edit', 'CMS\ArtistController@edit')
            ->name('artists.edit');
    

        Route::put('artists/{artist}/image', 'CMS\ArtistController@addImage')
            ->name('artists.addImage');

        Route::put('artists/{artist}/bio', 'CMS\ArtistController@bio')
            ->name('artists.bio');

        // Event & News Routes
        Route::get('events/index', 'CMS\EventController@index')
            ->name('events.index');

        Route::get('events/create', 'CMS\EventController@create')
            ->name('events.create');

        Route::get('events/{event}/edit', 'CMS\EventController@edit')
            ->name('events.edit');

        Route::put('events/{event}/tag', 'CMS\EventController@tag')
            ->name('events.tag');

        Route::delete('events/{event}/tag', 'CMS\EventController@untag')
            ->name('events.untag');

        Route::put('events/{event}/body', 'CMS\EventController@body')
            ->name('events.body');

        Route::put('events/{event}/heading', 'CMS\EventController@heading')
            ->name('events.heading');

        Route::put('events/{event}/image', 'CMS\EventController@addImage')
            ->name('events.addImage');

        Route::put('events/{event}/toggleLive', 'CMS\EventController@toggleLive')
            ->name('events.toggleLive');

        Route::put('events/{event}/dateTime', 'CMS\EventController@dateTime')
            ->name('events.dateTime');

    });
});



