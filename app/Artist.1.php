<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Artwork;
use App\Artist;


class Artist extends Model
{
    //
    public function artworks()
    {
        return $this->hasMany('App\Artwork');
    }

    public function newArtistForm() 
    {
        echo "newArtistForm()";
    }

    public function updateArtistForm()
    {
        echo "updateArtistForm()";
    }
}
