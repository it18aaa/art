<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artwork;

class GalleryController extends Controller
{
    public function browsePage() 
    {
        return view('gallery')
            ->with('artwork', 
                Artwork::where('onsale', 1)
                    ->orderby('name','asc')
                        ->get()
            );
    }

    public function splashPage() 
    {
        return view('splash')
            ->with('featured', Artwork::where('onsale', 1)
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
