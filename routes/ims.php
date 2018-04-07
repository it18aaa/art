<?php

Route::middleware(['auth', 'requirerole:ims'])->group(function() {

    Route::get('/', "IMS\HomeController@index")
        ->name('ims.home');
    
    Route::name('ims.')->group(function() {

        Route::resource('users', 'IMS\UserController');
        Route::post('roleattach/{role_name}/{user_id}', 'IMS\RoleController@attach');
        Route::post('roledetach/{role_name}/{user_id}', 'IMS\RoleController@detach');
        Route::get('users/{user}/password', 'IMS\UserController@editPassword')
            ->name('users.password.edit');
        Route::put('users/{user}/password', 'IMS\UserController@updatePassword')
            ->name('users.password.update');

        Route::resource('artworks', 'IMS\ArtworkController');    
        Route::resource('customers', 'IMS\CustomerController');        
        Route::resource('artists', 'IMS\ArtistController');

        Route::resource('sales', 'IMS\SaleController');

        Route::post('sales/{sale}/{artwork}', 'IMS\SaleController@addArtwork')
            ->name('sales.addArtwork');

        Route::delete('sales/{sale}/{artwork}', 'IMS\SaleController@removeArtwork')
            ->name('sales.removeArtwork');

        Route::post('sales/{sale}/close', 'IMS\SaleController@close')
            ->name('sales.close');
            
        Route::post('sales/{sale}/pay', 'IMS\SaleController@pay')
            ->name('sales.pay');

    });
});
    

