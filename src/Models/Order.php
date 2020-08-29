<?php

namespace Submtd\VinylGraphics\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use NumberFormatter;

class Order extends Model
{
    /**
     * Fillable attributes.
     * @var array
     */
    protected $fillable = [
        'user_id',
        'shipping_address_id',
        'billing_address_id',
        'placed',
        'processed',
        'shipped',
    ];

    /**
     * Sub total attribute.
     */
    public function getSubTotalAttribute()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->price;
        }

        return $total;
    }

    /**
     * Display sub total attribute.
     */
    public function getDisplaySubTotalAttribute()
    {
        $formatter = new NumberFormatter('en_US', NumberFormatter::DECIMAL_ALWAYS_SHOWN);

        return $formatter->format($this->total);
    }

    /**
     * Shipping attribute.
     */
    public function getShippingAttribute()
    {
        return config('vinyl-graphics.shipping', 10);
    }

    /**
     * Display shipping attribute.
     */
    public function getDisplayShippingAttribute()
    {
        $formatter = new NumberFormatter('en_US', NumberFormatter::DECIMAL_ALWAYS_SHOWN);

        return $formatter->format($this->shipping);
    }

    /**
     * Total attribute.
     */
    public function getTotalAttribute()
    {
        if (! $this->items()->count()) {
            return 0;
        }

        return $this->subTotal + $this->shipping;
    }

    /**
     * Display total attribute.
     */
    public function getDisplayTotalAttribute()
    {
        $formatter = new NumberFormatter('en_US', NumberFormatter::DECIMAL_ALWAYS_SHOWN);

        return $formatter->format($this->total);
    }

    /**
     * Belongs to User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Has many items.
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }

    /**
     * Belongs to billing address.
     */
    public function billingAddress()
    {
        return $this->belongsTo(Address::class, 'billing_address_id', 'id');
    }

    /**
     * Belongs to shipping address.
     */
    public function shippingAddress()
    {
        return $this->belongsTo(Address::class, 'shipping_address_id', 'id');
    }
}
