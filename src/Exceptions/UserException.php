<?php

namespace Submtd\VinylGraphics\Exceptions;

use Throwable;

class UserException extends BaseException
{
    /**
     * Validation failed
     * @param string $message
     * @param int $code
     * @param Throwable $previous
     * @return self
     */
    public static function validationFailed(
        string $message = null,
        int $code = null,
        Throwable $previous = null
    ) : self {
        $message = $message ?? 'Validation failed';
        $code = $code ?? 422;
        return static::exception($message, $code, $previous);
    }

    /**
     * User not found
     * @param string $message
     * @param int $code
     * @param Throwable $previous
     * @return self
     */
    public static function userNotFound(
        string $message = null,
        int $code = null,
        Throwable $previous = null
    ) : self {
        $message = $message ?? 'User not found';
        $code = $code ?? 404;
        return static::exception($message, $code, $previous);
    }
}
