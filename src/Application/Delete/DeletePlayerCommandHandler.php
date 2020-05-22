<?php

declare(strict_types = 1);

namespace App\Application\Delete;

use App\Domain\PlayerRepository;
use App\Infrastructure\Share\Bus\Command\CommandHandlerInterface;

class DeletePlayerCommandHandler  implements CommandHandlerInterface
{
    private PlayerRepository $playerRepository;

    public function __construct(PlayerRepository $playerRepository)
    {
        $this->playerRepository = $playerRepository;
    }

    public function execute(DeletePlayerCommand $command)
    {
        $player = $this->playerRepository->findById($command->getId());

        if($player){
            $this->playerRepository->remove($player);
        }
    }
}
