<?php

namespace Submtd\VinylGraphics\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * Fillable attributes.
     * @var array
     */
    protected $fillable = [
        'user_id',
        'address_1',
        'address_2',
        'city',
        'state',
        'zip',
        'primary_shipping',
        'primary_billing',
    ];

    /**
     * Belongs to user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
