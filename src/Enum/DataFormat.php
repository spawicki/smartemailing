<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Enum;

enum DataFormat: string
{
    case TEXT = 'text';
    case JSON = 'json';
}