<?php

namespace Submtd\VinylGraphics\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Submtd\VinylGraphics\Models\Font;

class Fonts extends Controller
{
    public function __invoke(Request $request)
    {
        $fonts = Font::orderBy('name')->paginate($request->get('limit') ?? 15);
        return view('vinyl-graphics::admin.fonts', ['fonts' => $fonts]);
    }
}
