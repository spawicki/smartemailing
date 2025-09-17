<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Api\Bag\Util;

use DateTime;
use InvalidArgumentException;

class Helper
{
    /**
     * @throws \DateMalformedStringException
     */
    public static function formatDate(string $date, string $format = 'Y-m-d H:i:s'): string
    {
        return new DateTime($date)->format($format);
    }

    public static function validateEmail(string $email): bool
    {
        if (!\filter_var($email, \FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(\sprintf('Email [%s] is not valid!', $email));
        }

        return true;
    }

    public static function replaceUrlParameters(string $uri, array $parameters): string
    {
        foreach ($parameters as $key => $value) {
            $uri = \str_replace((string)u((string)$key)->prepend(':')->lower(), (string)$value, $uri);
        }

        return $uri;
    }

}