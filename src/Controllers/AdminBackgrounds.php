<?php

namespace Submtd\VinylGraphics\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Submtd\VinylGraphics\Models\Image;

class AdminBackgrounds extends Controller
{
    public function __invoke(Request $request)
    {
        $backgrounds = Image::orderBy('name')->paginate($request->get('limit') ?? 15);

        return view('vinyl-graphics::admin.backgrounds', ['backgrounds' => $backgrounds]);
    }
}
