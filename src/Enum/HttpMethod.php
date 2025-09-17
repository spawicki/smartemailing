<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Enum;

enum HttpMethod: string
{
    case GET = 'GET';
    case POST = 'POST';
    case PATCH = 'PATCH';
    case DELETE = 'DELETE';
    case PUT = 'PUT';
}