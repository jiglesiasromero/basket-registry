<?php

namespace App\Tests\Infrastructure\Player\Specification;

use App\Domain\Entity\Specification\ValidAvegareRateSpecificationInterface;

class ValidAvegareRateSatisfiedSpecificationStub implements  ValidAvegareRateSpecificationInterface
{

    /**
     * @inheritDoc
     */
    public function isValid(int $id): bool
    {
        return true;
    }
}