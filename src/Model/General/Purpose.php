<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Model\General;

use Spawicki\SmartEmailing\Exception\AllowedTypeException;
use Spawicki\SmartEmailing\Model\AbstractModel;

class Purpose extends AbstractModel
{
    public const string LAWFUL_CONSENT = 'consent';
    public const string LAWFUL_CONTRACT = 'contract';
    public const string LAWFUL_LEGAL_OBLIGATION = 'legal-obligation';
    public const string LAWFUL_LEGITIMATE_INTEREST = 'legitimate-interest';
    public const string LAWFUL_VITAL_INTEREST = 'vital-interest';
    public const string LAWFUL_PUBLIC_TASK = 'public-task';

    /**
     * Lawful basis bound to purpose
     * Allowed values: "consent", "contract", "legal-obligation", "legitimate-interest", "vital-interest", "public-task"
     */
    protected string $lawfulBasis;

    /**
     *  Internal purpose name. Your contacts will not see it.
     */
    protected string $name;

    /**
     * Purpose duration
     */
    protected Period $duration;

    /**
     * Internal purpose notes. Your contacts will not see it.
     * Default value: null
     */
    protected ?string $notes;

    public function __construct(
        string $lawfulBasis,
        string $name,
        Period $duration,
        ?string $notes = null,
    ) {
        $this->setLawfulBasis($lawfulBasis);
        $this->setName($name);
        $this->setDuration($duration);
        $this->setNotes($notes);
    }

    public function getLawfulBasis(): string
    {
        return $this->lawfulBasis;
    }

    /**
     * @throws AllowedTypeException
     */
    public function setLawfulBasis(string $lawfulBasis): Purpose
    {
        AllowedTypeException::check(
            $lawfulBasis,
            [
                self::LAWFUL_CONSENT,
                self::LAWFUL_CONTRACT,
                self::LAWFUL_LEGAL_OBLIGATION,
                self::LAWFUL_LEGITIMATE_INTEREST,
                self::LAWFUL_VITAL_INTEREST,
                self::LAWFUL_PUBLIC_TASK,
            ]
        );
        $this->lawfulBasis = $lawfulBasis;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getDuration(): Period
    {
        return $this->duration;
    }

    public function setDuration(Period $duration): static
    {
        $this->duration = $duration;
        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): Purpose
    {
        $this->notes = $notes;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'lawful_basis' => $this->getLawfulBasis(),
            'name' => $this->getName(),
            'duration' => $this->getDuration(),
            'notes' => $this->getNotes(),
        ];
    }
}