<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Artwork;
use App\Event;

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
            'featuredArtworks'=> Artwork::getFeatured()->slice(0,4),
            'artworks' => Artwork::where([
                            'sold' => false, 'sale_id' => null
                        ])
                        ->orderBy('name')
                        ->paginate(10),
            'events' => Event::withAnyTags('event')
                        ->orderBy('timedate')
                        ->get()
                        ->slice(0,5),
            'news' => Event::withAnyTags('news,feature')
                        ->orderBy('timedate')
                        ->get()
                        ->slice(0,5)
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
