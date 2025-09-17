<?php

namespace Spawicki\SmartEmailing\Enum;

enum ResponseStatus: string
{
    case ERROR = 'error';
    case SUCCESS = 'ok';
    case CREATED = 'created';
    case DELETED = 'deleted';
}