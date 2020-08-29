<?php

namespace Submtd\VinylGraphics\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Submtd\VinylGraphics\Models\Font;

class AdminFontsAdd extends Controller
{
    public function __invoke(Request $request)
    {
        if (! $request->get('name')) {
            return view('vinyl-graphics::admin.fonts-add');
        }
        $request->validate([
            'name' => 'required|max:255|unique:fonts,name',
            'font' => 'required',
            'cost_multiplier' => 'required|numeric',
        ]);
        $font = Font::create([
            'name' => $request->get('name'),
            'svg' => $request->get('font'),
            'cost_multiplier' => $request->get('cost_multiplier'),
        ]);

        return response()->redirectTo(route('admin.fonts.edit', ['id' => $font->id]));
    }
}
