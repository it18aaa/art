<?php

namespace App\Http\Controllers\IMS;

use App\Artwork;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtworkController extends Controller
{
    public function index()
    {
        
        return view('IMS.artworks.index')
            ->with('artworks', Artwork::paginate(15));
    }

    public function create()
    {
        return view('IMS.artworks.create');
    }
    
    public function store(Request $request)
    {
        $artwork = new Artwork();
        $artwork->validateAndSave($request);

        return redirect()->route('ims.artworks.index')
            ->with('info', $artwork->name . "created.");
    }
    
    public function show(Artwork $artwork)
    {
        //
        echo __CLASS__ . " " . __METHOD__ . " " . " not yet implemented!";
    }

    public function edit(Artwork $artwork)
    {
        echo __CLASS__ . " " . __METHOD__ . " " . " not yet implemented!";
    }

    public function update(Request $request, Artwork $artwork)
    {
        echo __CLASS__ . " " . __METHOD__ . " " . " not yet implemented!";
    }

    public function destroy(Artwork $artwork)
    {
        echo __CLASS__ . " " . __METHOD__ . " " . " not yet implemented!";
    }
}
