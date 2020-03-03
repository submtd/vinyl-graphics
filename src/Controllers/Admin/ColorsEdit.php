<?php

namespace Submtd\VinylGraphics\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Submtd\VinylGraphics\Models\Color;

class ColorsEdit extends Controller
{
    public function __invoke(Request $request, $id)
    {
        if (!$color = Color::find($id)) {
            abort(404);
        }
        if ($request->has('updated')) {
            $request->validate([
                'name' => 'required|max:255|unique:colors,name,' . $color->id . ',id',
                'color_code' => ['required', 'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/i'],
            ]);
            // update record
            $color->update([
                'name' => $request->get('name'),
                'color_code' => $request->get('color_code'),
            ]);
        }
        return view('vinyl-graphics::admin.colors-edit', ['color' => $color]);
    }
}
