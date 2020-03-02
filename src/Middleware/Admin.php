<?php

namespace Submtd\VinylGraphics\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle method
     * @param Request $request
     * @param Closure $next
     * @return Closure
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$user = Auth::user()) {
            abort(401);
        }
        if (!$user->admin) {
            abort(401);
        }
        return $next($request);
    }
}
