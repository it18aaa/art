<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    //
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function artworks()
    {
        return $this->hasMany('App\Artwork');
    }

}
