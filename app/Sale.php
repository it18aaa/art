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

    public function calcTotalExVat()
    {
        $total = 0;
        foreach($this->artworks as $artwork)
        {
            $total += $artwork->price;
        }
        return $total;
    }

    public function calcVat() 
    {
        return $this->calcTotalExVat() * 0.2;
    }

    public function calcTotalIncVat() 
    {
        return $this->calcTotalExVat + $this->calcVat();
    }

    public function itemCount()
    {
        return $this->artworks->count();
    }
}
