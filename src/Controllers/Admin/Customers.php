<?php

namespace Submtd\VinylGraphics\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class Customers extends Controller
{
    public function __invoke(Request $request)
    {
        return view('vinyl-graphics::admin.customers');
    }
}
