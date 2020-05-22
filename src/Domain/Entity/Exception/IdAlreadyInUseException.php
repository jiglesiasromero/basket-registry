<?php

declare(strict_types = 1);

namespace App\Domain\Entity\Exception;

class IdAlreadyInUseException extends \InvalidArgumentException
{

    /**
     * IdAlreadyInUseException constructor.
     */
    public function __construct()
    {
        parent::__construct('The id (dorsal) is already used by other player');
    }
}
