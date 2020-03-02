<?php

namespace Submtd\VinylGraphics\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class Orders extends Controller
{
    public function __invoke(Request $request)
    {
        return view('vinyl-graphics::admin.orders');
    }
}
