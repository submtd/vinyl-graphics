<?php

namespace Submtd\VinylGraphics\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Submtd\VinylGraphics\Models\BackgroundImage;

class Backgrounds extends Controller
{
    public function __invoke(Request $request)
    {
        $backgrounds = BackgroundImage::orderBy('name')->paginate($request->get('limit') ?? 15);
        return view('vinyl-graphics::admin.backgrounds', ['backgrounds' => $backgrounds]);
    }
}
