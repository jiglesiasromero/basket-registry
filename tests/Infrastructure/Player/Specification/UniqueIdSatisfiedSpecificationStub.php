<?php

namespace App\Tests\Infrastructure\Player\Specification;

use App\Domain\Entity\Specification\UniqueIdSpecificationInterface;

class UniqueIdSatisfiedSpecificationStub implements UniqueIdSpecificationInterface
{

    /**
     * @inheritDoc
     */
    public function isUnique(int $id): bool
    {
        return true;
    }
}