<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
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

    public function validateAndSave(Request $request)
    {
        // refactored out of IMS\ArtistController

        $data = $request->validate([
            'title' => 'max:30',
            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'bio' => 'max:255',
            'email' => 'string|email|max:50',
            'address1' => 'max:50',
            'address2' => 'max:50',
            'town' => 'max:50',
            'county' => 'max:30',
            'postcode' => 'max:15',
            'telephone' => 'string|max:50',
        ]);

        $this->title =       $data['title'];
        $this->firstname =   $data['firstname'];
        $this->lastname =    $data['lastname'];
        $this->bio =         $data['bio'];
        $this->email =       $data['email'];
        $this->address1 =    $data['address1'];
        $this->address2 =    $data['address2'];
        $this->town   =      $data['town'];
        $this->county =      $data['county'];
        $this->postcode =    $data['postcode'];
        $this->telephone =   $data['telephone'];
        $this->save();
    }

    public static function orderAndListAll() 
    {
        $allArtists = Artist::orderBy('lastname')->get();

        $artist_array = array();

        foreach($allArtists as $artist) 
        {
            $artist_array[$artist->id] = $artist->firstname . " " . $artist->lastname;
        }

        return $artist_array;

    }



}

