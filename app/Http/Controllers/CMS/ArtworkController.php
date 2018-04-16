<?php

namespace App\Http\Controllers\CMS;

use App\Artwork;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtworkController extends Controller
{

    public function index()
    {       
            $artworks = Artwork::where('sold', false)
                ->orderBy('name')
                ->paginate(10);
            
            return view('CMS.artworks.index')       
                ->with(['artworks' => $artworks]);
    }
 
 
    public function edit(Artwork $artwork)
    {
        return view('CMS.artworks.edit')
            ->with('artwork', $artwork);
    }  

    public function tag(Artwork $artwork, Request $request)
    {
        $artwork->tag($request->tag);       
        return back()->with('info','tag added');
    }

    public function untag(Artwork $artwork, Request $request)
    {
        $artwork->untag($request->tag);
        return back()->with('warning','tag removed');
    }

    public function addImage(Artwork $artwork, Request $request)    
    {       
        if($request->hasFile('image') && 
            $request->file('image')->isValid() )
            {
                $filename = $artwork->id . ".jpg";
                $request->file('image')->move(public_path("/img/artwork/"), $filename);
            }
        
        return back()
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0')
            ->with('info','Image uploaded, you may need to refresh page to view');
    }

    public function description(Artwork $artwork, Request $request)
    {
        
        $data = $request->validate([
            'description' => 'required'
        ]);

        $artwork->description = $data['description'];
        $artwork->save();

        return back()->with('info','Description updated');

    }

}
