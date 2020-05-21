<?php

namespace App\Application\Create;

use App\Domain\Entity\Exception\IdAlreadyInUseException;
use App\Domain\Entity\Exception\NotValidAverageRateException;
use App\Domain\Entity\Player;
use App\Domain\Entity\Specification\UniqueIdSpecificationInterface;
use App\Domain\Entity\Specification\ValidAvegareRateSpecificationInterface;
use App\Domain\PlayerRepository;

class CreatePlayerCommandHandler
{
    /**
     * @var PlayerRepository
     */
    private $playerRepository;

    /**
     * @var UniqueIdSpecificationInterface
     */
    private $uniqueIdSpecification;

    /**
     * @var ValidAvegareRateSpecificationInterface
     */
    private $validAvegareRateSpecification;


    public function __construct(
        PlayerRepository                       $playerRepository,
        UniqueIdSpecificationInterface         $uniqueIdSpecification,
        ValidAvegareRateSpecificationInterface $validAvegareRateSpecification
    ){
        $this->playerRepository              = $playerRepository;
        $this->uniqueIdSpecification         = $uniqueIdSpecification;
        $this->validAvegareRateSpecification = $validAvegareRateSpecification;
    }

    /**
     * @throws IdAlreadyInUseException
     * @throws NotValidAverageRateException
     */
    public function execute(CreatePlayerCommand $command)
    {
        $player = Player::create(
            $this->uniqueIdSpecification,
            $this->validAvegareRateSpecification,
            $command->getId(),
            $command->getName(),
            $command->getRole(),
            $command->getRate()
        );

        $this->playerRepository->save($player);

    }
}
