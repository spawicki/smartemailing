<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Api\Enum;

enum DataFormat: string
{
    case TEXT = 'text';
    case JSON = 'json';
}