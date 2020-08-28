<?php

namespace Submtd\VinylGraphics\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Submtd\VinylGraphics\Models\Image;

class PublicHome extends Controller
{
    public function __invoke(Request $request)
    {
        if (! $image_id = $request->get('image_id')) {
            $image_id = $request->session()->get('image_id');
        }
        if (! $image = Image::find($image_id)) {
            $image = Image::first();
        }
        $request->session()->put('image_id', $image->id);

        return view('vinyl-graphics::public.home', ['image' => $image]);
    }
}
