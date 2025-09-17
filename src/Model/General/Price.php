<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Model\General;

use App\Services\SmartEmailing\Api\src\Model\AbstractModel;

class Price extends AbstractModel
{
    protected float $withoutVat;
    protected float $withVat;

    /**
     * Currency code (ISO-4217 three-letter ("Alpha-3")) i.e.: CZK, EUR
     */
    protected string $currency;

    public function __construct(float $withoutVat, float $withVat, string $currency)
    {
        $this->setWithoutVat($withoutVat);
        $this->setWithVat($withVat);
        $this->setCurrency($currency);
    }

    public function getWithoutVat(): float
    {
        return $this->withoutVat;
    }

    public function getWithVat(): float
    {
        return $this->withVat;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setWithoutVat(int|float $withoutVat): static
    {
        $this->withoutVat = \floatval($withoutVat);
        return $this;
    }

    public function setWithVat(int|float $withVat): static
    {
        $this->withVat = \floatval($withVat);
        return $this;
    }

    /**
     * item price currency code (ISO-4217 three-letter ("Alpha-3")) i.e.: CZK, EUR
     */
    public function setCurrency(string $currency): static
    {
        $this->currency = \substr(\strtoupper($currency), 0, 3);
        return $this;
    }

    public function toArray(): array
    {
        return [
            'without_vat' => $this->getWithoutVat(),
            'with_vat' => $this->getWithVat(),
            'currency' => $this->getCurrency(),
        ];
    }
}