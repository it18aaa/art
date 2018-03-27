<?php

Route::middleware(['auth', 'requirerole:ims'])->group(function() {

    Route::get('/', "IMS\HomeController@index")
        ->name('ims.home');
    
    Route::name('ims.')->group(function() {

        Route::resource('users', 'IMS\UserController');
        Route::resource('artworks', 'IMS\ArtworkController');    
        Route::resource('customers', 'IMS\CustomerController');        
        Route::resource('artists', 'IMS\ArtistController');

        Route::post('roleattach/{role_name}/{user_id}', 'IMS\RoleController@attach');
        Route::post('roledetach/{role_name}/{user_id}', 'IMS\RoleController@detach');

        Route::get('users/{user}/password', 'IMS\UserController@editPassword')
            ->name('users.password.edit');
        Route::put('users/{user}/password', 'IMS\UserController@updatePassword')
            ->name('users.password.update');

    });
});
    

