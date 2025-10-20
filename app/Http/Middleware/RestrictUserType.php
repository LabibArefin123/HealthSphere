<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestrictUserType
{
    /**
     * Handle an incoming request.
     * 
     * Usage: ->middleware('check.user_type:admin,manager')
     */
    public function handle(Request $request, Closure $next, ...$allowedTypes): mixed
    {
        if (Auth::check()) {
            $userType = Auth::user()->user_type;

            // If no types specified or user's type is not in allowed list
            if (empty($allowedTypes) || !in_array($userType, $allowedTypes)) {
                return redirect()->route('home')->with('error', 'Access denied.');
            }
        }

        return $next($request);
    }
}
