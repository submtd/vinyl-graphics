<?php

namespace Submtd\VinylGraphics\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Submtd\VinylGraphics\Models\Color;

class AdminColorsEdit extends Controller
{
    public function __invoke(Request $request, $id)
    {
        if (! $color = Color::find($id)) {
            abort(404);
        }
        if ($request->has('updated')) {
            $request->validate([
                'name' => 'required|max:255|unique:colors,name,'.$color->id.',id',
                'color_code' => ['required', 'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/i'],
                'type' => 'required|in:vinyl,print',
            ]);
            // update record
            $color->update([
                'name' => $request->get('name'),
                'color_code' => $request->get('color_code'),
                'type' => $request->get('type'),
            ]);
        }

        return view('vinyl-graphics::admin.colors-edit', ['color' => $color]);
    }
}
