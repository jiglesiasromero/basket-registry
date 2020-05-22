<?php

declare(strict_types = 1);

namespace App\Application\Query;

class ViewPlayersQuery
{

    /**
     * @var string|null
     */
    private $sortBy;

    /**
     * @var string|null
     */
    private $sortType;

    public function __construct(?string $sortBy, ?string $sortType)
    {
        $this->sortBy   = $sortBy;
        $this->sortType = $sortType;
    }

    /**
     * @return string|null
     */
    public function getSortBy(): ?string
    {
        return $this->sortBy;
    }

    /**
     * @return string|null
     */
    public function getSortType(): ?string
    {
        return $this->sortType;
    }

}