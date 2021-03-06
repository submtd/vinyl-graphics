<?php

namespace Submtd\VinylGraphics\Subscribers;

use Carbon\Carbon;

class UserEventSubscriber
{
    /**
     * Handle user login events
     * @param $event
     */
    public function handleUserLogin($event)
    {
        $event->user->update(['last_login_at' => Carbon::now()]);
    }

    /**
     * Handle user logout events
     * @param $event
     */
    public function handleUserLogout($event)
    {
    }

    /**
     * Register listeners
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'Illuminate\Auth\Events\Login',
            'Submtd\VinylGraphics\Subscribers\UserEventSubscriber@handleUserLogin'
        );
        $events->listen(
            'Illuminate\Auth\Events\Logout',
            'Submtd\VinylGraphics\Subscribers\UserEventSubscriber@handleUserLogout'
        );
    }
}
