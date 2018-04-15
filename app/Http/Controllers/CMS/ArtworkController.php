<?php

namespace App\Http\Controllers\CMS;

use App\Artwork;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtworkController extends Controller
{

    public function index()
    {       
            $artworks = Artwork::where('sold', false)->orderBy('name')->paginate(10);
            
            return view('CMS.artworks.index')       
                ->with(['artworks' => $artworks]);
    }
 
    public function show(Artwork $artwork)
    {
        //
    }
  
    public function edit(Artwork $artwork)
    {
        //
    }
   
    public function update(Request $request, Artwork $artwork)
    {
        //
    }

    public function tag($text)
    {

    }

    public function untag($text)
    {

    }
}
