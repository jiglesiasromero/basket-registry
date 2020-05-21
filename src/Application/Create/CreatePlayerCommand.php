<?php

namespace App\Application\Create;

use App\Infrastructure\Share\Bus\Command\Command;

class CreatePlayerCommand implements Command
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $role;

    /**
     * @var int
     */
    private $rate;

    /**
     * CreatePlayerCommand constructor.
     * @param int    $id
     * @param string $name
     * @param string $role
     * @param int    $rate
     */
    public function __construct(int $id, string $name, string $role, int $rate)
    {
        $this->id   = $id;
        $this->name = $name;
        $this->role = $role;
        $this->rate = $rate;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @return int
     */
    public function getRate(): int
    {
        return $this->rate;
    }

}
