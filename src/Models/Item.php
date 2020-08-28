<?php

namespace Submtd\VinylGraphics\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * Fillable attributes.
     * @var array
     */
    protected $fillable = [];

    /**
     * Belongs to Order.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
