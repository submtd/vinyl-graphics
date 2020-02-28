<?php

namespace Submtd\VinylGraphics\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static App\User create(string $name, string $email, string $password, bool $admin = false)
 * @method static App\User update(int $id, array $attributes = [])
 *
 * @see Submtd\VinylGraphics\Services\UserService
 */

class UserFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'user-service';
    }
}
