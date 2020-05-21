<?php

namespace App\Application\Delete;

use App\Domain\PlayerRepository;

class DeletePlayerCommandHandler
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
