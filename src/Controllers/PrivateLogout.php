<?php

namespace Submtd\VinylGraphics\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class PrivateLogout extends Controller
{
    public function __invoke(Request $request)
    {
        Auth::logout();

        return response()->redirectTo(route('home'));
    }
}
