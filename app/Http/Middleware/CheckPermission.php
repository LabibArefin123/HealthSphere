<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    public function handle(Request $request, Closure $next, ...$permissions)
    {
        $user = $request->user();

        foreach ($permissions as $permission) {
            if (!$user || !$user->hasPermissionTo($permission)) {
                return redirect('no-access');
            }
        }

        return $next($request);
    }
}

