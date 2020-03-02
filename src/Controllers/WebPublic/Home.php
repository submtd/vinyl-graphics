<?php

namespace Submtd\VinylGraphics\Controllers\WebPublic;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Submtd\VinylGraphics\Models\BackgroundImage;
use Submtd\VinylGraphics\Models\Font;

class Home extends Controller
{
    public function __invoke(Request $request)
    {
        if (!$background = BackgroundImage::find($request->get('background'))) {
            if (!$background = BackgroundImage::first()) {
                abort(404);
            }
        }
        if (!$font = Font::find($request->get('font'))) {
            if (!$font = Font::first()) {
                abort(404);
            }
        }
        return view('vinyl-graphics::public.home', ['background' => $background, 'font' => $font]);
    }
}
