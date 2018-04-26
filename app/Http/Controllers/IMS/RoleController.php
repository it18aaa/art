<?php

namespace App\Http\Controllers\IMS;


use App\User;
use App\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{

    public function attach($role_id, $user_id)
    {
        $user = User::find($user_id);
        $role = Role::find($role_id);

        if( !$user->hasRole($role->name) ) 
        {
            $user->roles()->attach($role);
        }        
        return redirect()->back();
    }

    public function detach($role_id, $user_id)
    {
        $user = User::find($user_id);
        $role = Role::find($role_id);
        if( $user->hasRole($role->name) ) 
        {
            $user->roles()->detach($role);
        }        
        return redirect()->back();
    }
}
