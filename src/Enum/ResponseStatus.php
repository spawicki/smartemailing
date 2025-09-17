<?php

namespace Spawicki\SmartEmailing\Api\Enum;

enum ResponseStatus: string
{
    case ERROR = 'error';
    case SUCCESS = 'ok';
    case CREATED = 'created';
    case DELETED = 'deleted';
}