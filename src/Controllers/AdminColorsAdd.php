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
            'cost_per_character' => 'required|numeric',
            'border_cost_per_character' => 'required|numeric',
            'enabled_for_color' => 'required|boolean',
            'enabled_for_border' => 'required|boolean',
        ]);
        $color = Color::create([
            'name' => $request->get('name'),
            'color_code' => $request->get('color_code'),
            'type' => $request->get('type'),
            'cost_per_character' => $request->get('cost_per_character'),
            'border_cost_per_character' => $request->get('border_cost_per_character'),
            'enabled_for_color' => $request->get('enabled_for_color'),
            'enabled_for_border' => $request->get('enabled_for_border'),
        ]);

        return response()->redirectTo(route('admin.colors.edit', ['id' => $color->id]));
    }
}
