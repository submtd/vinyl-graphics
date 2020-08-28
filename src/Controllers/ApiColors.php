<?php

namespace Submtd\VinylGraphics\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Submtd\VinylGraphics\Models\Color;
use Submtd\VinylGraphics\Resources\ColorCollection;

class ApiColors extends Controller
{
    /**
     * Invoke.
     */
    public function __invoke(Request $request)
    {
        $colors = Color::all();

        return new ColorCollection($colors);
    }
}
