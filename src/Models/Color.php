<?php

namespace Submtd\VinylGraphics\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    /**
     * Fillable attributes
     * @var array $fillable
     */
    protected $fillable = [
        'name',
        'color_code',
    ];
}
