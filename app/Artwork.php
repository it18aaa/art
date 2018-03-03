<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Artist;

class Artwork extends Model
{    
    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }
}
