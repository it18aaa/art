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
        $artist = new Artist();
        $artist->validateAndSave($request);

        return redirect('/ims/artists')
            ->with('info', $artist->firstname . " " . $artist->lastname . " created. ");
    }


    public function show(Artist $artist)
    {        

    }

    public function edit(Artist $artist)
    {
        
        return view('IMS.artists.create')
            ->with('artist', $artist);
    }

    public function update(Request $request, Artist $artist)
    {
        $artist->validateAndSave($request);

        return redirect()->route('ims.artists.index')
            ->with('info', $artist->firstname . " " . $artist->lastname .  " modified successfully.");
    }

    public function destroy(Artist $artist)
    {
        try {
            Artist::destroy($artist->id);
        } catch (\Exception $e) {
           //dd($e);
           // it is likely this deleteion has tried to break
           // referential integrity, so retreat gracefully,
           // showing a nice user friendly message
            $message = "Unable to remove " . 
                $artist->firstname . " " . $artist->lastname. 
                ", does this artist have any artworks?";

           return redirect()->back()->with('warning', $message);
        }


        return redirect()->back();
    }



}
