<?php

namespace Submtd\VinylGraphics\Controllers\WebPublic;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Submtd\VinylGraphics\Models\Image;
use Submtd\VinylGraphics\Models\Color;
use Submtd\VinylGraphics\Models\Font;

class Home extends Controller
{
    public function __invoke(Request $request)
    {
        if (!$background = Image::find($request->get('background'))) {
            if (!$background = Image::first()) {
                abort(404);
            }
        }
        if (!$font = Font::find($request->get('font'))) {
            if (!$font = Font::first()) {
                abort(404);
            }
        }
        if (!$color = Color::find($request->get('color'))) {
            if (!$color = Color::first()) {
                abort(404);
            }
        }
        if (!$border_color = Color::find($request->get('border_color'))) {
            if (!$border_color = Color::first()) {
                abort(404);
            }
        }
        $fonts = Font::orderBy('name')->get();
        $colors = Color::orderBy('name')->get();
        return view('vinyl-graphics::public.home', [
            'background' => $background,
            'font' => $font,
            'color' => $color,
            'border_color' => $border_color,
            'fonts' => $fonts,
            'colors' => $colors]);
    }
}
