<?php

namespace Submtd\VinylGraphics\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Submtd\VinylGraphics\Models\Font;

class FontsAdd extends Controller
{
    public function __invoke(Request $request)
    {
        if (!$request->get('name')) {
            return view('vinyl-graphics::admin.fonts-add');
        }
        $request->validate([
            'name' => 'required|max:255|unique:fonts,name',
            'font' => 'required|image|mimes:svg|max:2048',
        ]);
        $file = $request->file('font');
        $fileName = Str::uuid()->toString();
        $file->storeAs(null, $fileName . '.svg', 'public');
        $font = Font::create([
            'name' => $request->get('name'),
            'filename' => $fileName,
        ]);
        return response()->redirectTo(route('admin.fonts.edit', ['id' => $font->id]));
    }
}
