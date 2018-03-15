<?php

namespace App\Http\Controllers;

use App\Artwork;
use App\Artist;
use Illuminate\Http\Request;

class ArtworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view("artwork/form")
            ->with('artists', Artist::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {              
        if($request->hasFile('artwork') && 
            $request->file('artwork')->isValid() ) 
        {
                $artwork = new Artwork();                
                $artwork->name = $request->name;
                $artwork->price = $request->price;
                $artwork->artist_id = $request->artist_id;

                if( null !== $request->pricepublic ) 
                { 
                    $artwork->pricepublic = true;
                } else {
                    $artwork->pricepublic = false;
                }

                if( null !== $request->onsale ) 
                { 
                    $artwork->onsale = true;
                } else {
                    $artwork->onsale = false;
                }

                $artwork->save();       
                $filename = $artwork->id . ".jpg";

                //$path = $request->file('artwork')->store('public');
                //echo $path;
                $request->file('artwork')->move(public_path("/img/artwork/"), $filename);

                return view('artwork/created')->with('artwork',$artwork);
        } else {
            return view('artwork/invalidpicture');
            // no picture detected
        }
        
    }

    public function descriptionsList() 
    {
        // show a list of artworks and click on one to update the description

        return view('CMS/artworkDescriptionsList')
            ->with('artworks', Artwork::all());
    }
    
    public function descriptionsForm($id) 
    {
        // load the relevent data into the description form
        // and displya it

        return view('CMS/artworkDescriptionsForm')
            ->with('artwork', Artwork::find($id));

    }

    public function descriptionsUpdate(Request $request) 
    {
        // write the updated artwork description 

        $artwork = Artwork::find($request->id);

        $artwork->description = $request->description;
        $artwork->save();

        //dd($artwork);

        return view('CMS/artworkDescriptionsDone')
            ->with('artwork', $artwork);

    }





    /**
     * Display the specified resource.
     *
     * @param  \App\Artwork  $artwork
     * @return \Illuminate\Http\Response
     */
    public function show(Artwork $artwork)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artwork  $artwork
     * @return \Illuminate\Http\Response
     */
    public function edit(Artwork $artwork)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artwork  $artwork
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artwork $artwork)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artwork  $artwork
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artwork $artwork)
    {
        //
    }
}
