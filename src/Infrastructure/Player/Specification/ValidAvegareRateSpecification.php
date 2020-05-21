<?php


namespace App\Infrastructure\Player\Specification;


use App\Domain\Entity\Exception\NotValidAverageRateException;
use App\Domain\Entity\Specification\ValidAvegareRateSpecificationInterface;
use App\Domain\Shared\AbstractSpecification;

class ValidAvegareRateSpecification extends AbstractSpecification implements ValidAvegareRateSpecificationInterface
{
    const MIN_VALUE = 0;
    const MAX_VALUE = 100;

    /**
     * @inheritDoc
     */
    public function isSatisfiedBy($value): bool
    {
        if($value >= self::MIN_VALUE && $value <= self::MAX_VALUE){
            return true;
        }

        throw new NotValidAverageRateException();
    }

    /**
     * @inheritDoc
     */
    public function isValid(int $id): bool
    {
        return $this->isSatisfiedBy($id);
    }
}