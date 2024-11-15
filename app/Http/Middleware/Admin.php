<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle($request, Closure $next, $guard = null)
    {
        // Ensure the user is authenticated
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            return redirect()->back(); // Or redirect to another route, like '/login'
        }

        return $next($request);
    }
}





