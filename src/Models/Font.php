<?php

namespace Submtd\VinylGraphics\Models;

use Illuminate\Database\Eloquent\Model;

class Font extends Model
{
    /**
     * Fillable attributes
     * @var array $fillable
     */
    protected $fillable = [
        'name',
        'filename',
    ];

    /**
     * path attribute
     */
    public function getPathAttribute()
    {
        return '/storage/' . $this->filename;
    }

    /**
     * render attribute
     */
    public function getRenderAttribute()
    {
        return file_get_contents(storage_path('app/public') . '/' . $this->filename);
    }
}
