<?php

namespace Submtd\VinylGraphics\Models;

use Illuminate\Database\Eloquent\Model;

class Font extends Model
{
    /**
     * Fillable attributes.
     * @var array
     */
    protected $fillable = [
        'name',
        'svg',
        'cost_multiplier',
    ];
}
