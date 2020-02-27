<?php

namespace Submtd\VinylGraphics\Facades;

use Illuminate\Support\Facades\Facade;

class VinylGraphics extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'vinyl-graphics';
    }
}
