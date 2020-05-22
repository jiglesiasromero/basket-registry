<?php

declare(strict_types = 1);

namespace App\Domain\Entity\Specification;

use App\Domain\Entity\Exception\NotValidAverageRateException;

interface ValidAvegareRateSpecificationInterface
{
    /**
     * @throws NotValidAverageRateException
     */
    public function isValid(int $id): bool;

}
