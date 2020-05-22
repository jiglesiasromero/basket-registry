<?php

declare(strict_types = 1);

namespace App\Application\Query;

use App\Domain\PlayerRepository;

class ViewPlayersQueryHandler
{
    private PlayerRepository $playerRepository;

    public function __construct(PlayerRepository $playerRepository)
    {
        $this->playerRepository = $playerRepository;
    }

    public function handleQuery(ViewPlayersQuery $query): array
    {
        return $this->playerRepository->findAllByCriteria($query->getSortBy(), $query->getSortType());
    }
}
