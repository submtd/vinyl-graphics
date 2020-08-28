<?php

namespace Submtd\VinylGraphics\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * Fillable attributes.
     * @var array
     */
    protected $fillable = [];

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
