<?php

namespace Submtd\VinylGraphics\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use Submtd\VinylGraphics\Subscribers\UserEventSubscriber;

class VinylGraphicsEventServiceProvider extends EventServiceProvider
{
    /**
     * Event listener mappings
     * @var array
     */
    protected $listen = [];

    /**
     * Subscriber classes
     * @var array
     */
    protected $subscribe = [
        UserEventSubscriber::class,
    ];
}
