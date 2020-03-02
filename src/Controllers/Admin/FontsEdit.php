<?php

namespace Submtd\VinylGraphics\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Controller;
use Submtd\VinylGraphics\Models\Font;

class FontsEdit extends Controller
{
    public function __invoke(Request $request, $id)
    {
        if (!$font = Font::find($id)) {
            abort(404);
        }
        if ($request->has('name')) {
            $request->validate([
                'name' => 'required|max:255|unique:fonts,name,' . $font->id . ',id',
                'font' => 'nullable|image|mimes:svg|max:2048',
            ]);
            if (!$file = $request->file('font')) {
                if (!file_exists(storage_path('app/public') . '/' . $font->filename . '.svg')) {
                    abort(500, 'File doesnt exist');
                }
                $file = new UploadedFile(storage_path('app/public') . '/' . $font->filename . '.svg', $font->filename . '.svg');
            }
            $fileName = Str::uuid()->toString();
            $file->storeAs(null, $fileName . '.svg', 'public');
            // unlink all original files
            if (file_exists(storage_path('app/public') . '/' . $font->filename . '.svg')) {
                unlink(storage_path('app/public') . '/' . $font->filename . '.svg');
            }
            // update record
            $font->update([
                'name' => $request->get('name'),
                'filename' => $fileName,
            ]);
        }
        return view('vinyl-graphics::admin.fonts-edit', ['font' => $font]);
    }
}
