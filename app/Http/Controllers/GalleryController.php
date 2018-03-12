<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artwork;

class GalleryController extends Controller
{
    public function indexPage() 
    {
        return view('galleryTest')
            ->with('artwork', 
                Artwork::where('onsale', 1)
                    ->orderby('name','asc')
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
