<?php

namespace Submtd\VinylGraphics\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Submtd\VinylGraphics\Models\Color;

class Colors extends Controller
{
    public function __invoke(Request $request)
    {
        $colors = Color::orderBy('name')->paginate($request->get('limit') ?? 15);
        return view('vinyl-graphics::admin.colors', ['colors' => $colors]);
    }
}
