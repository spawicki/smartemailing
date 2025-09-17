<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Bag;

use App\Services\SmartEmailing\Api\src\Model\General\Attachment;

class AttachmentBag extends AbstractBag
{
    public function add(Attachment $model): static
    {
        $this->insertEntry($model);
        return $this;
    }

    public function create(
        string $fileName,
        string $contentType,
        string $data,
    ): Attachment
    {
        $model = (new Attachment($fileName, $contentType, $data));
        $this->add($model);
        return $model;
    }
}