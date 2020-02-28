<?php

namespace Submtd\VinylGraphics\Exceptions;

use Exception;
use Throwable;

abstract class BaseException extends Exception
{
    /**
     * Unknown Error
     * @param string $message
     * @param int $code
     * @param Throwable $previous
     * @return self
     */
    public static function unknownError(
        string $message = null,
        int $code = null,
        Throwable $previous = null
    ) : self {
        $message = $message ?? 'Unknown error';
        $code = $code ?? 500;
        return static::exception($message, $code, $previous);
    }

    /**
     * return exception
     * @param string $message
     * @param int $code
     * @param Throwable $previous
     * @return self
     */
    protected static function exception(
        string $message = '',
        int $code = 0,
        Throwable $previous = null
    ) : self {
        return new static($message, $code, $previous);
    }
}
