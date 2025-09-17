<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Api\Model\General;

use Spawicki\SmartEmailing\Api\Model\AbstractModel;
use Spawicki\SmartEmailing\Api\Model\ModelInterface;

class Replace extends AbstractModel implements ModelInterface
{
    /**
     * Dynamic tag name.
     * Eg: key = product_12 will cause all occurrences of {{replace_product_12}} string to be replaced.
     */
    protected string $key;

    /**
     * Dynamic tag content which will be used to replace dynamic tag.
     */
    protected string $content;

    public function __construct(string $key, string $content)
    {
        $this->setKey($key);
        $this->setContent($content);
    }

    public function getIdentifier(): string
    {
        return $this->getKey();
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function setKey(string $key): static
    {
        $this->key = $key;
        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'key' => $this->getKey(),
            'content' => $this->getContent(),
        ];
    }
}