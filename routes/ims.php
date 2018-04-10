<?php

Route::middleware(['auth', 'requirerole:ims'])->group(function() {

    Route::get('/', "IMS\HomeController@index")
        ->name('ims.home');
    
    Route::name('ims.')->group(function() {

        Route::resource('artworks', 'IMS\ArtworkController');    
        Route::resource('customers', 'IMS\CustomerController');        
        Route::resource('artists', 'IMS\ArtistController');

        // User routes
        Route::resource('users', 'IMS\UserController');
        Route::post('roleattach/{role_name}/{user_id}', 'IMS\RoleController@attach');
        Route::post('roledetach/{role_name}/{user_id}', 'IMS\RoleController@detach');
        Route::get('users/{user}/password', 'IMS\UserController@editPassword')
            ->name('users.password.edit');
        Route::put('users/{user}/password', 'IMS\UserController@updatePassword')
            ->name('users.password.update');

        // Sales
        Route::resource('sales', 'IMS\SaleController');

        Route::post('sales/{sale}/{artwork}', 'IMS\SaleController@addArtwork')
            ->name('sales.addArtwork');

        Route::delete('sales/{sale}/{artwork}', 'IMS\SaleController@removeArtwork')
            ->name('sales.removeArtwork');

        Route::put('sales/{id}/complete', 'IMS\SaleController@complete')
            ->name('sales.complete');
        
        Route::put('sales/{id}/pay', 'IMS\SaleController@pay')
            ->name('sales.pay');

        Route::get('sales/index/paid', 'IMS\SaleController@indexPaid')
            ->name('sales.index.paid');

        Route::get('sales/index/unpaid', 'IMS\SaleController@indexUnpaid')
            ->name('sales.index.unpaid');

        Route::get('sales/index/complete', 'IMS\SaleController@indexComplete')
            ->name('sales.index.complete');

        Route::get('sales/index/customer/{id}', 'IMS\SaleController@indexCustomer')
            ->name('sales.index.customer');
    
    }); 
});
    

