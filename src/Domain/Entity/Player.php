<?php

declare(strict_types = 1);

namespace App\Domain\Entity;

use App\Domain\Entity\Specification\UniqueIdSpecificationInterface;
use App\Domain\Entity\Specification\ValidAvegareRateSpecificationInterface;

class Player
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $role;

    /**
     * @var int
     */
    private $rate;

    /**
     * Player constructor.
     * @param int    $id
     * @param string $name
     * @param string $role
     * @param int    $rate
     */
    private function __construct(int $id, string $name, string $role, int $rate)
    {
        $this->id   = $id;
        $this->name = $name;
        $this->role = $role;
        $this->rate = $rate;
    }

    public static function create(
        UniqueIdSpecificationInterface $uniqueIdSpecification,
        ValidAvegareRateSpecificationInterface $validAvegareRateSpecification,
        int $id,
        string $name,
        string $role,
        int $rate
    ): self
    {
        $uniqueIdSpecification->isUnique($id);

        $validAvegareRateSpecification->isValid($rate);

        return new self($id, $name, $role, $rate);
    }
}