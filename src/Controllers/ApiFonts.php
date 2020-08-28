<?php

namespace Submtd\VinylGraphics\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Submtd\VinylGraphics\Models\Font;
use Submtd\VinylGraphics\Resources\FontCollection;

class ApiFonts extends Controller
{
    /**
     * Invoke.
     */
    public function __invoke(Request $request)
    {
        $fonts = Font::all();

        return new FontCollection($fonts);
    }
}
