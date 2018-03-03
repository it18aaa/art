<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artwork;

class GalleryController extends Controller
{
    public function indexPage() {
        return view('gallery')
            ->with('artwork', 
                Artwork::where('onsale', 1)
                    ->orderby('name','asc')
                        ->get()
            );
    }
}