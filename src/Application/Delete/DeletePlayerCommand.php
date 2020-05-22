<?php

declare(strict_types = 1);

namespace App\Application\Delete;

use App\Infrastructure\Share\Bus\Command\CommandInterface;

class DeletePlayerCommand  implements CommandInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * DeletePlayerCommand constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

}
