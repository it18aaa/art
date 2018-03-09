<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class RequireRole {
    public function handle($request, Closure $next, $role) {
        abort_unless(auth()->check() 
            && auth()->user()->hasRole($role), 403, "You dont have permission for this area!");
            return $next($request);
    }    
}