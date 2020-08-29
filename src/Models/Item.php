<?php

namespace Submtd\VinylGraphics\Models;

use Illuminate\Database\Eloquent\Model;
use NumberFormatter;

class Item extends Model
{
    /**
     * Fillable attributes.
     * @var array
     */
    protected $fillable = [
        'order_id',
        'font_id',
        'color_id',
        'border_color_id',
        'text',
        'quantity',
    ];

    /**
     * Price attribute.
     */
    public function getPriceAttribute()
    {
        $len = strlen($this->text);

        return round(($len * $this->color->cost_per_character) + ($len * $this->borderColor->cost_per_character) * $this->font->cost_multiplier * $this->quantity, 2);
    }

    /**
     * Display price attribute.
     */
    public function getDisplayPriceAttribute()
    {
        $formatter = new NumberFormatter('en_US', NumberFormatter::DECIMAL_ALWAYS_SHOWN);

        return $formatter->format($this->price);
    }

    /**
     * Belongs to Order.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Belongs to font.
     */
    public function font()
    {
        return $this->belongsTo(Font::class);
    }

    /**
     * Belongs to color.
     */
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    /**
     * Belongs to border color.
     */
    public function borderColor()
    {
        return $this->belongsTo(Color::class, 'border_color_id', 'id');
    }
}
