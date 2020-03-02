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
        'extension',
    ];

    /**
     * path attribute
     */
    public function getPathAttribute()
    {
        return '/storage/' . $this->filename . '.svg';
    }
}
