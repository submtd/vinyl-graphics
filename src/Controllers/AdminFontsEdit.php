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
                'font' => 'nullable',
            ]);
            // update record
            $font->update([
                'name' => $request->get('name'),
                'svg' => $request->get('font') ?? $font->svg,
            ]);
        }

        return view('vinyl-graphics::admin.fonts-edit', ['font' => $font]);
    }
}
