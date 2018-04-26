<?php

namespace App\Http\Controllers\IMS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    
    public function index()
    {
        return view('IMS.home.index');
    }
}
