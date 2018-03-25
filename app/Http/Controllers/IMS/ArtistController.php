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
        //
        $artist = new Artist();
        $artist->firstname = $request->firstname;
        $artist->lastname = $request->lastname;
        $artist->bio = $request->bio;
        $artist->save();

        return redirect('/ims/artists')
            ->with('info', $artist->firstname . " " . $artist->lastname . " created. ");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {        
        return view('artists.view')
            ->with([
                'artist' => $artist,
                'artworks' => $artist->artworksPaginate(10)
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function edit(Artist $artist)
    {
        //
        return view('IMS.artists.create')
            ->with('artist', $artist);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artist $artist)
    {
        //
        $artist->firstname = $request->firstname;
        $artist->lastname = $request->lastname;
        $artist->bio = $request->bio;
        $artist->save();

        return redirect('/artists')
            ->with('info', $artist->firstname . " " . $artist->lastname .  " modified successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
    {
        //stub
        echo "Artist destroy() not yet implememtned";
    }
}
