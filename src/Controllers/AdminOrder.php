<?php

namespace Submtd\VinylGraphics\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminOrder extends Controller
{
    public function __invoke(Request $request)
    {
        return view('vinyl-graphics::admin.orders');
    }
}
