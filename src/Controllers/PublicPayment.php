<?php

namespace Submtd\VinylGraphics\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PublicPayment extends Controller
{
    public function __invoke(Request $request)
    {
        dd($request);
    }
}
