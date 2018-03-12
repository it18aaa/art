<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IMSController extends Controller
{
    
    public function index() 
    {
       return view('ims/dash');
    }
}
