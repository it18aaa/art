<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Cviebrock\EloquentTaggable\Taggable;
use App\Artist;


class Artwork extends Model
{    
    use Taggable;

    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }

    public function sale()
    {
        return $this->belongsTo('App\Sale');
    }

    

    public function validateAndSave(Request $request) 
    {
        $data = $request->validate([            
            'name' => 'required|string|max:100',
            'price' => 'required|integer',            
            'artist' => 'required|integer',
            'sold' => 'boolean',
            'pricepublic' => 'boolean',
            'description' => 'nullable|string|max:255',
            'width' => 'integer',
            'height' => 'integer',
            'depth' => 'integer',
        ]);

        $this->name =       $data['name'];
        $this->price =       $data['price']    ;
        $this->artist_id =    $data['artist'];
        $this->sold =         $data['sold'];
        $this->pricepublic =  $data['pricepublic'];
        $this->description = $data['description'];      
        $this->width =      $data['width'];
        $this->height =    $data['height'];
        $this->depth =   $data['depth'];

        $this->save();

    }

    public static function getFeatured()
    {
        // do we have enough tagged ?
        $data = Artwork::withAnyTags('featured,feature,')->get();

        return $data;
    }
    


}
