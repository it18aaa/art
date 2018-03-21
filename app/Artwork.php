<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Artist;
use App\Tag;

class Artwork extends Model
{    
    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
}
