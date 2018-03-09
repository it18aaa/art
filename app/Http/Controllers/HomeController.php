<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function index()
    {
=======
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['cms', 'ims']);
>>>>>>> 9703886b975a8c540897dc176e0f7a058e13d2c3
        return view('home');
    }
}
