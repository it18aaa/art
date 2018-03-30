<?php

namespace App\Http\Controllers\IMS;

use App\Artist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtistController extends Controller
{

    public function index()
    {
        return view('IMS.artists.index')
            ->with('artists', Artist::paginate(15));
    }

    public function create()
    {
        return view('IMS.artists.create');
    }

    public function store(Request $request)
    {
        $artist = $this->validateArtist($request, new Artist());

        return redirect('/ims/artists')
            ->with('info', $artist->firstname . " " . $artist->lastname . " created. ");
    }


    public function show(Artist $artist)
    {        
        return view('artists.view')
            ->with([
                'artist' => $artist,
                'artworks' => $artist->artworksPaginate(10)
            ]);
    }

    public function edit(Artist $artist)
    {
        
        return view('IMS.artists.create')
            ->with('artist', $artist);
    }

    public function update(Request $request, Artist $artist)
    {
        $updated_artist = $this->validateArtist($request, $artist);

        return redirect('/ims/artists')
            ->with('info', $updated_artist->firstname . " " .
                 $updated_artist->lastname . " updated. ");


        return redirect()->route('ims.artists.index')
            ->with('info', $artist->firstname . " " . $artist->lastname .  " modified successfully.");
    }

    public function destroy(Artist $artist)
    {
        //stub
        echo "Artist destroy() not yet implememtned";
    }

    private function validateArtist(Request $request, Artist $artist)
    {
        // refactored function

        $data = $request->validate([
            'title' => 'max:30',
            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'bio' => 'max:255',
            'email' => 'string|email|max:50',
            'address1' => 'string|max:50',
            'address2' => 'string|max:50',
            'town' => 'max:50',
            'county' => 'max:30',
            'postcode' => 'max:15',
            'telephone' => 'string|max:50',
        ]);

        $artist->title = $data['title'];
        $artist->firstname   = $data['firstname'];
        $artist->lastname   = $data['lastname'];
        $artist->bio   = $data['bio'];
        $artist->email   = $data['email'];
        $artist->address1   = $data['address1'];
        $artist->address2   = $data['address2'];
        $artist->town   = $data['town'];
        $artist->county   = $data['county'];
        $artist->postcode   = $data['postcode'];
        $artist->telephone = $data['telephone'];
        $artist->save();

        return $artist;
    }


}
