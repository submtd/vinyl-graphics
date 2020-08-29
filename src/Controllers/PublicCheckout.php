<?php

namespace Submtd\VinylGraphics\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PublicCheckout extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->getMethod() != 'POST') {
            return view('vinyl-graphics::public.checkout');
        }
    }
}
