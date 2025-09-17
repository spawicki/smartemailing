<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Model\General;

use App\Services\SmartEmailing\Api\src\Bag\ReplaceBag;
use App\Services\SmartEmailing\Api\src\Model\AbstractModel;

class EmailTemplate extends AbstractModel
{
    /**
     * E-mail or E-mail template ID
     */
    protected int $emailId;

    /**
     * Dynamic contents to be replaced
     */
    protected ReplaceBag $replaceBag;

    public function __construct(int $emailId, ?ReplaceBag $replaceBag = null)
    {
        $this->setEmailId($emailId);
        $this->setReplaceBag(\is_null($replaceBag) ? new ReplaceBag() : $replaceBag);
    }

    public function getEmailId(): int
    {
        return $this->emailId;
    }

    public function setEmailId(int $emailId): EmailTemplate
    {
        $this->emailId = $emailId;
        return $this;
    }

    public function getReplaceBag(): ReplaceBag
    {
        return $this->replaceBag;
    }

    public function setReplaceBag(ReplaceBag $replaceBag): EmailTemplate
    {
        $this->replaceBag = $replaceBag;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'email_id' => $this->getEmailId(),
            'replace' => $this->getReplaceBag(),
        ];
    }
}