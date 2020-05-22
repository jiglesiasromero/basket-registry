<?php

declare(strict_types = 1);

namespace App\Domain\Entity\Specification;

use App\Domain\Entity\Exception\IdAlreadyInUseException;

interface UniqueIdSpecificationInterface
{
    /**
     * @throws IdAlreadyInUseException
     */
    public function isUnique(int $id): bool;

}
