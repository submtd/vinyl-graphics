<?php

namespace Submtd\VinylGraphics\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Submtd\VinylGraphics\Models\Image;
use Submtd\VinylGraphics\Resources\ImageCollection;

class ApiImages extends Controller
{
    /**
     * Invoke.
     * @param \Illuminate\Http\Request $request
     */
    public function __invoke(Request $request)
    {
        $images = Image::all();

        return new ImageCollection($images);
    }
}
