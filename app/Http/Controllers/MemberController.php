<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    //
    public function index() 
    {

        echo "MEMBERS MENU AREA!";
        die();
        return view('member\menu');
    }
}
