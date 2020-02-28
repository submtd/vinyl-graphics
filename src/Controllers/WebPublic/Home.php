<?php

namespace Submtd\VinylGraphics\Controllers\WebPublic;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class Home extends Controller
{
    public function __invoke(Request $request)
    {
        return view('vinyl-graphics::public.home');
    }
}
