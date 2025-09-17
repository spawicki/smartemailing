<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Enum;

enum ResponseCode: int
{
    case HTTP_ERROR_CODE = 500;
    case HTTP_BAD_REQUEST_CODE = 400;
    case HTTP_UNAUTHORIZED_CODE = 401;
    case HTTP_FORBIDDEN_CODE = 403;
    case HTTP_NOT_FOUND_CODE = 404;
    case HTTP_CONFLICT_CODE = 409;
    case HTTP_UNPROCESSABLE_ENTITY_CODE = 422;
    case HTTP_METHOD_NOT_ALLOWED_CODE = 405;
    case HTTP_SUCCESS_CODE = 200;
    case HTTP_CREATED_CODE = 201;
    case HTTP_ACCEPTED = 202;
    case HTTP_NON_AUTHORITATIVE_INFORMATION = 203;
    case HTTP_NOT_CONTENT_CODE = 204;
    case HTTP_RESET_CONTENT = 205;
    case HTTP_PARTIAL_CONTENT = 206;
    case HTTP_MULTI_STATUS = 207;

}