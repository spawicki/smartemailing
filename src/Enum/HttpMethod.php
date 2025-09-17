<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Enum;

enum HttpMethod: string
{
    case GET = 'GET';
    case POST = 'POST';
    case PATCH = 'PATCH';
    case DELETE = 'DELETE';
    case PUT = 'PUT';
}