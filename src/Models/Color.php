<?php

namespace Submtd\VinylGraphics\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    /**
     * Fillable attributes.
     * @var array
     */
    protected $fillable = [
        'name',
        'color_code',
        'type',
        'cost_per_character',
        'border_cost_per_character',
        'enabled_for_color',
        'enabled_for_border',
    ];
}
