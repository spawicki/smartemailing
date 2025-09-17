<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Api\Bag;

use Spawicki\SmartEmailing\Api\Model\General\Attachment;

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