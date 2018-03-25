<?php

Route::get('/', "CMS\HomeController@index")
    ->middleware('auth')->middleware('requirerole:cms');

