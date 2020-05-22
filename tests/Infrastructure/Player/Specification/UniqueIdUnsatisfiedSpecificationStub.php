<?php

namespace App\Tests\Infrastructure\Player\Specification;

use App\Domain\Entity\Specification\UniqueIdSpecificationInterface;

class UniqueIdUnsatisfiedSpecificationStub implements UniqueIdSpecificationInterface
{

    /**
     * @inheritDoc
     */
    public function isUnique(int $id): bool
    {
        return false;
    }
}