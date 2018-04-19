<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artwork;

class GalleryController extends Controller
{
    public function browsePage() 
    {
        /* old
        return view('gallery.main')
            ->with('artwork', 
                Artwork::where('sale_id', null)
                    ->orderby('name','asc')
                        ->get()
            );
        */

        return view('gallery.main')->with([
            'featuredArtworks'=> Artwork::getFeatured(),
        ]);
    }

    public function splashPage() 
    {
        return view('splash')
            ->with('featured', Artwork::where('sold', 0)
                    ->orderby('price','desc')
                        ->take(4)
                            ->get()
            );
    }

    public function artwork($id)
    {
        //echo "Hello $id";
        return view('artwork/view')
            ->with('artwork', Artwork::find($id));
    }

    public function about() {
        return view('about/newabout');
    }
}
