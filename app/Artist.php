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

    public function countArtworks()
    {
        return $this->artworks()->count();
    }

    public function countSold()
    {
        return $this->artworks()->where('sold', 1)->count();
    }

    public function artworksPaginate($count = 0) 
    {
        if($count > 0) {
            return $this->artworks()->paginate($count);
        } else {
            return $this->artworks(); 
        }
    }
}

