<?php

namespace Submtd\VinylGraphics\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Submtd\VinylGraphics\Models\Image;

class BackgroundsAdd extends Controller
{
    public function __invoke(Request $request)
    {
        if (!$request->get('name')) {
            return view('vinyl-graphics::admin.backgrounds-add');
        }
        $request->validate([
            'name' => 'required|max:255|unique:images,name',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $file = $request->file('image');
        $fileName = Str::uuid()->toString();
        $fileExtension = $file->getClientOriginalExtension();
        $file->storeAs(null, $fileName . '.' . $fileExtension, 'public');
        $image = Image::create([
            'name' => $request->get('name'),
            'filename' => $fileName,
            'extension' => $fileExtension,
        ]);
        return response()->redirectTo(route('admin.backgrounds.edit', ['id' => $image->id]));
    }
}
