<?php

declare(strict_types=1);

namespace App\Infrastructure\Player\Specification;

use App\Domain\Entity\Exception\IdAlreadyInUseException;
use App\Domain\Entity\Specification\UniqueIdSpecificationInterface;
use App\Domain\PlayerRepository;
use App\Domain\Shared\AbstractSpecification;

final class UniqueIdSpecification extends AbstractSpecification implements UniqueIdSpecificationInterface
{

    /**
     * @var PlayerRepository
     */
    private $playerRepository;

    /**
     * UniqueIdSpecification constructor.
     * @param PlayerRepository $playerRepository
     */
    public function __construct(PlayerRepository $playerRepository)
    {
        $this->playerRepository = $playerRepository;
    }

    /**
     * @throws IdAlreadyInUseException
     */
    public function isUnique(int $id): bool
    {
        return $this->isSatisfiedBy($id);
    }

    /**
     * @param int $value
     * @return bool
     */
    public function isSatisfiedBy($value): bool
    {
        $player = $this->playerRepository->findById($value);
        if($player) {
            throw new IdAlreadyInUseException();
        }

        return true;

    }
}