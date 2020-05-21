<?php

namespace App\Domain\Entity\Specification;

use App\Domain\Entity\Exception\NotValidAverageRateException;

interface ValidAvegareRateSpecificationInterface
{
    /**
     * @throws NotValidAverageRateException
     */
    public function isValid(int $id): bool;

}
