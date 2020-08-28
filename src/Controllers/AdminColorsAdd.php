<?php

namespace Submtd\VinylGraphics\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Submtd\VinylGraphics\Models\Color;

class AdminColorsAdd extends Controller
{
    public function __invoke(Request $request)
    {
        if (! $request->get('name')) {
            return view('vinyl-graphics::admin.colors-add');
        }
        $request->validate([
            'name' => 'required|max:255|unique:colors,name',
            'color_code' => ['required', 'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/i'],
            'type' => 'required|in:vinyl,print',
        ]);
        $color = Color::create([
            'name' => $request->get('name'),
            'color_code' => $request->get('color_code'),
            'type' => $request->get('type'),
        ]);

        return response()->redirectTo(route('admin.colors.edit', ['id' => $color->id]));
    }
}
