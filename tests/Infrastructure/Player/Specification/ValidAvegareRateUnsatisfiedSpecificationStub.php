<?php

namespace App\Tests\Infrastructure\Player\Specification;

use App\Domain\Entity\Specification\ValidAvegareRateSpecificationInterface;

class ValidAvegareRateUnsatisfiedSpecificationStub implements ValidAvegareRateSpecificationInterface
{

    /**
     * @inheritDoc
     */
    public function isValid(int $id): bool
    {
        return false;
    }
}