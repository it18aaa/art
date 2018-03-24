<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use \Conner\Tagging\Taggable;
use App\Artist;


class Artwork extends Model
{    
    use \Conner\Tagging\Taggable;

    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }

}
