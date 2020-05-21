<?php

declare(strict_types = 1);

namespace App\Domain;

use App\Domain\Entity\Player;

interface PlayerRepository
{
    public function save(Player $player): void;

    public function findById(int $id): ?Player;

    public function findAll(): ?array;

    public function remove(Player $player): void;

    public function findAllByCriteria(?string $criteria, ?string $orderBy): ?array;
}
