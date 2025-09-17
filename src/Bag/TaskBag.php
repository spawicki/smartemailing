<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Bag;

use Spawicki\SmartEmailing\Model\General\Recipient;
use Spawicki\SmartEmailing\Model\General\Task;

class TaskBag extends AbstractBag
{
    public function add(Task $model): TaskBag
    {
        $this->insertEntry($model);
        return $this;
    }

    public function create(
        Recipient      $recipient,
        ReplaceBag     $replaceBag,
        ?AttachmentBag $attachmentsBag = null,
        array          $templateVariables = [],
    ): Task
    {
        if (\is_null($attachmentsBag)) {
            $attachmentsBag = new AttachmentBag();
        }

        $model = new Task($recipient, $replaceBag, $attachmentsBag, $templateVariables);
        $this->add($model);
        return $model;
    }

    public function checkEntry(string $property): bool
    {
        return false;
    }
}