<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Exception;

use Exception;

class AllowedTypeException extends Exception
{
    /**
     * @throws AllowedTypeException
     */
    public static function check(string $type, array $allowed): void
    {
        if (!\in_array($type, $allowed)) {
            throw new AllowedTypeException(
                \sprintf(
                    'This type [%s] is not allowed. Supported types [%s]',
                    $type,
                    \implode(', ', $allowed)
                )
            );
        }
    }
}