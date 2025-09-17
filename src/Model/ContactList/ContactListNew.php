<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Model\ContactList;

use App\Services\SmartEmailing\Api\src\Exception\RequiredFieldException;

class ContactListNew extends ContactList
{
    public function __construct(
        string  $name,
        string  $senderName,
        string  $senderEmail,
        string  $replyTo,
        ?string $publicName = null,
    )
    {
        parent::__construct(
            $name,
            $publicName,
            $senderName,
            $senderEmail,
            $replyTo
        );
    }

    /**
     * @throws RequiredFieldException
     */
    public function toArray(): array
    {
        $data = array_filter(
            [
                'name' => $this->getName(),
                'publicname' => $this->getPublicName(),
                'sendername' => $this->getSenderName(),
                'senderemail' => $this->getSenderEmail(),
                'replyto' => $this->getReplyTo(),
            ],
            static fn($item) => !is_null($item)
        );
        RequiredFieldException::check(
            [
                'name',
                'sendername',
                'senderemail',
                'replyto',
            ],
            $data
        );
        return $data;
    }

}