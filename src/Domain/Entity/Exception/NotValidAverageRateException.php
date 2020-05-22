<?php

declare(strict_types = 1);

namespace App\Domain\Entity\Exception;

class NotValidAverageRateException extends \InvalidArgumentException
{

    /**
     * NotValidAverageRateException constructor.
     */
    public function __construct()
    {
        parent::__construct('The average rate must be between 0 and 100');
    }
}
