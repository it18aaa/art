<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Customer extends Model
{
    //
    public function sales()
    {
        return $this->hasMany('App\Sale');
    }

    public function validateAndSave(Request $request)
    {
        // refactored out of IMS\ArtistController

        $data = $request->validate([
            'title' => 'max:30',
            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',            
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
        $this->email =       $data['email'];
        $this->address1 =    $data['address1'];
        $this->address2 =    $data['address2'];
        $this->town   =      $data['town'];
        $this->county =      $data['county'];
        $this->postcode =    $data['postcode'];
        $this->telephone =   $data['telephone'];
        $this->save();
    }

}
