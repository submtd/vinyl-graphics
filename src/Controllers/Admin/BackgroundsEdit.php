<?php

namespace Submtd\VinylGraphics\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Controller;
use Submtd\VinylGraphics\Models\BackgroundImage;

class BackgroundsEdit extends Controller
{
    public function __invoke(Request $request, $id)
    {
        if (!$backgroundImage = BackgroundImage::find($id)) {
            abort(404);
        }
        if ($request->has('updated')) {
            $request->validate([
                'name' => 'required|max:255|unique:background_images,name,' . $backgroundImage->id . ',id',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            if (!$file = $request->file('image')) {
                $file = new UploadedFile(storage_path('app/public') . '/' . $backgroundImage->filename . '.' . $backgroundImage->extension, $backgroundImage->filename . '.' . $backgroundImage->extension);
            }
            $fileName = Str::uuid()->toString();
            $fileExtension = $file->getClientOriginalExtension();
            $file->storeAs(null, $fileName . '.' . $fileExtension, 'public');
            // unlink all original files
            if (file_exists(storage_path('app/public') . '/' . $backgroundImage->filename . '.' . $backgroundImage->extension)) {
                unlink(storage_path('app/public') . '/' . $backgroundImage->filename . '.' . $backgroundImage->extension);
            }
            foreach (glob(storage_path('app/public') . '/' . $backgroundImage->filename . '-*.' . $backgroundImage->extension) as $originalFile) {
                unlink($originalFile);
            }
            // update record
            $backgroundImage->update([
                'name' => $request->get('name'),
                'filename' => $fileName,
                'extension' => $fileExtension,
            ]);
        }
        return view('vinyl-graphics::admin.backgrounds-edit', ['background' => $backgroundImage]);
    }
}
