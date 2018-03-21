<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Artwork;

class Tag extends Model
{
    /*
    *  get artwork associated with a tag
    *
    *   @return \ILluminate\Database\Eloquent\Relations\BelongsToMany
    *
    */

    public function artworks() 
    {
        return $this->belongsToMany('App\Artwork');
    }
}
