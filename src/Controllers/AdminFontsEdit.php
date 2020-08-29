<?php

namespace Submtd\VinylGraphics\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Submtd\VinylGraphics\Models\Font;

class AdminFontsEdit extends Controller
{
    public function __invoke(Request $request, $id)
    {
        if (! $font = Font::find($id)) {
            abort(404);
        }
        if ($request->has('name')) {
            $request->validate([
                'name' => 'required|max:255|unique:fonts,name,'.$font->id.',id',
                'font' => 'required',
                'cost_multiplier' => 'required|numeric',
            ]);
            // update record
            $font->update([
                'name' => $request->get('name'),
                'svg' => $request->get('font'),
                'cost_multiplier' => $request->get('cost_multiplier'),
            ]);
        }

        return view('vinyl-graphics::admin.fonts-edit', ['font' => $font]);
    }
}
