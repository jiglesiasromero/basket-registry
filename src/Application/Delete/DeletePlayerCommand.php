<?php

namespace App\Application\Delete;

use App\Infrastructure\Share\Bus\Command\Command;

class DeletePlayerCommand implements Command
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
