<?php

namespace Submtd\VinylGraphics\Models;

use Spatie\Image\Image;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;

class BackgroundImage extends Model
{
    /**
     * Fillable attributes
     * @var array $fillable
     */
    protected $fillable = [
        'name',
        'filename',
        'extension',
    ];

    /**
     * path attribute
     */
    public function getPathAttribute()
    {
        return '/storage/' . $this->filename . '.' . $this->extension;
    }

    /**
     * resize
     * @param int $width
     * @param int $height
     * @return string
     */
    public function resize(int $width, int $height)
    {
        if (!$this->exists()) {
            return null;
        }
        $fileName = $this->filename . '-' . $width . '-' . $height . '.' . $this->extension;
        $path = '/storage/' . $fileName;
        if (file_exists(storage_path('app/public') . '/' . $fileName)) {
            return $path;
        }
        if (!file_exists(storage_path('app/public') . '/' . $this->filename . '.' . $this->extension)) {
            return null;
        }
        $image = Image::load(storage_path('app/public') . '/' . $this->filename . '.' . $this->extension);
        $image->fit(Manipulations::FIT_CROP, $width, $height);
        $image->save(storage_path('app/public') . '/' . $fileName);
        return $path;
    }
}
