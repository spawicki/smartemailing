<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Response;

class ImportResponse extends BaseResponse
{
    protected array $contacts_map = [];

    public function getContactsMap(): array
    {
        return $this->contacts_map;
    }
}