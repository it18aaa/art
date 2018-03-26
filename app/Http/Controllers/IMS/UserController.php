<?php

namespace App\Http\Controllers\IMS;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
  
    public function index()
    {
        //
        //echo __CLASS__ . " - " . __FUNCTION__ . " not yet implemented ";


        return view('IMS.users.index')
            ->with('users', User::all() );
    }

  
    public function create()
    {
        //
        echo __CLASS__ . " - " . __FUNCTION__ . " not yet implemented ";
    }

   
    public function store(Request $request)
    {
        //
        echo __CLASS__ . " - " . __FUNCTION__ . " not yet implemented ";
    }

  
    public function show(User $user)
    {
        //
        echo __CLASS__ . " - " . __FUNCTION__ . " not yet implemented ";
    }

  
    public function edit(User $user)
    {
        //
        echo __CLASS__ . " - " . __FUNCTION__ . " not yet implemented ";
    }

 
    public function update(Request $request, User $user)
    {
        //
        echo __CLASS__ . " - " . __FUNCTION__ . " not yet implemented ";
    }

 
    public function destroy(User $user)
    {
        //
        echo __CLASS__ . " - " . __FUNCTION__ . " not yet implemented ";
    }
}
