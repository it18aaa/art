<?php

namespace App\Http\Controllers;

use App\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('artists.index')
            ->with('artists', Artist::paginate(20));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('forms.Artist');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $artist = new Artist();
        $artist->firstname = $request->firstname;
        $artist->lastname = $request->lastname;
        $artist->save();

        return redirect('/artists')
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
        return view('forms.Artist')
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
