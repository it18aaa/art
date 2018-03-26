<?php

namespace App\Http\Controllers\IMS;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  
    public function index()
    {
        return view('IMS.users.index')
            ->with([
                'users' => User::all(),
                'roles' => Role::all()
            ]);
    }

  
    public function create()
    {              
        return view('IMS.users.create');            
    }

   
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->route('ims.users.index');
    }

  
    public function show(User $user)
    {
        //
        echo __CLASS__ . " - " . __FUNCTION__ . " not yet implemented ";
    }

  
    public function edit(User $user)
    {
        //
        return view('IMS.users.create')
            ->with('user', $user);
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
