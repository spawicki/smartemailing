<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Model\General;

use Spawicki\SmartEmailing\Model\General\Pure;
use Spawicki\SmartEmailing\Bag\AbstractBag;
use Spawicki\SmartEmailing\Bag\AttachmentBag;
use Spawicki\SmartEmailing\Bag\ReplaceBag;
use Spawicki\SmartEmailing\Model\AbstractModel;
use Spawicki\SmartEmailing\Model\ModelInterface;

class Task extends AbstractModel implements ModelInterface
{
    /**
     * Single recipient's data. New contact will be created if it does not exist yet.
     */
    protected Recipient $recipient;

    /**
     * Dynamic tags to customize e-mail for current recipient.
     */
    protected ReplaceBag $replaceBag;

    protected AttachmentBag $attachmentsBag;

    protected array $templateVariables = array();

    /**
     * @param Recipient $recipient
     * @param ReplaceBag|null $replaceBag
     * @param AttachmentBag|null $attachmentsBag
     * @param array $templateVariables
     */
    public function __construct(
        Recipient      $recipient,
        ?ReplaceBag    $replaceBag = null,
        ?AttachmentBag $attachmentsBag = null,
        array          $templateVariables = [],
    )
    {
        $this->setRecipient($recipient);
        $this->setReplaceBag(\is_null($replaceBag) ? new ReplaceBag() : $replaceBag);
        $this->setAttachmentsBag(\is_null($attachmentsBag) ? new AttachmentBag() : $attachmentsBag);
        $this->setTemplateVariables($templateVariables);
    }

    #[Pure]
    public function getIdentifier(): string
    {
        return $this->getRecipient()->getEmailAddress();
    }

    public function addTemplateVariable(string $key, mixed $value): static
    {
        $this->templateVariables[$key] = $value;
        return $this;
    }

    public function getTemplateVariables(): array
    {
        return $this->templateVariables;
    }

    public function setTemplateVariables(array $templateVariables): static
    {
        $this->templateVariables = $templateVariables;
        return $this;
    }

    public function getAttachmentsBag(): AttachmentBag
    {
        return $this->attachmentsBag;
    }

    public function setAttachmentsBag(AttachmentBag $attachmentsBag): static
    {
        $this->attachmentsBag = $attachmentsBag;
        return $this;
    }

    public function getRecipient(): Recipient
    {
        return $this->recipient;
    }

    public function setRecipient(Recipient $recipient): static
    {
        $this->recipient = $recipient;
        return $this;
    }

    public function getReplaceBag(): ReplaceBag
    {
        return $this->replaceBag;
    }

    public function setReplaceBag(ReplaceBag $replaceBag): static
    {
        $this->replaceBag = $replaceBag;
        return $this;
    }

    public function toArray(): array
    {
        return \array_filter(
            [
                'recipient' => $this->getRecipient(),
                'replace' => $this->getReplaceBag(),
                'template_variables' => $this->getTemplateVariables(),
                'attachments' => $this->getAttachmentsBag(),
            ],
            static fn($item) => (
                (!\is_array($item) && \is_a($item, AttachmentBag::class))
                || (!\is_array($item) && \is_a($item, ReplaceBag::class))
                || (!\is_array($item) && \is_a($item, AbstractBag::class) && !$item->isEmpty())
                || (!\is_array($item) && \is_a($item, Recipient::class))
                || (\is_array($item) && \count($item) > 0)
            )
        );
    }
}