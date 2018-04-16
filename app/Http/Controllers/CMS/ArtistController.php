<?php

namespace App\Http\Controllers\CMS;

use App\Artist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtistController extends Controller
{
    
    public function index()
    {
        $artists = Artist::orderBy('lastname')->paginate(10);

        return view('CMS.artists.index')
            ->with('artists', $artists);
    }

    public function edit(Artist $artist)
    {
        return view('CMS.artists.edit')
            ->with('artist', $artist);

    }

    public function addImage(Artist $artist, Request $request)
    {
        if($request->hasFile('image') && 
            $request->file('image')->isValid() )
            {
                $filename = $artist->id . ".jpg";
                $request->file('image')->move(public_path("/img/artist/"), $filename);
            }
        
        return back()
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0')
            ->with('info', 'Image updated - if you cannot see new image, you may have to refresh the page');


    }

    public function bio(Artist $artist, Request $request)
    {
        $data = $request->validate([
            'bio' => 'required'
        ]);

        $artist->bio = $data['bio'];
        $artist->save();

        return back()->with('info','Bio updated');

    }
    
}
