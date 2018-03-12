<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CMSController extends Controller
{
    //
    public function index() 
    {
        // CMS

        //echo "CMS AREA!";
        return view('cms/dash');


    }
}
