<?php

namespace Submtd\VinylGraphics\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle method.
     * @param Request $request
     * @param Closure $next
     * @return Closure
     */
    public function handle(Request $request, Closure $next)
    {
        if (! $user = Auth::user()) {
            throw new Exception('User is not logged in');
        }
        if (! $user->admin) {
            throw new Exception('User is not an admin');
        }

        return $next($request);
    }
}
