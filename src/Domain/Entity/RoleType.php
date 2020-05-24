<?php

declare(strict_types=1);

namespace App\Domain\Entity;

use Assert\Assertion;

class RoleType
{
    public const BASE      = 'BASE';
    public const ALERO     = 'ALERO';
    public const ESCOLTA   = 'ESCOLTA';
    public const PIVOT     = 'PIVOT';
    public const ALA_PIVOT = 'ALA-PIVOT';

    public const VALID_ROLES = [
        self::ALA_PIVOT,
        self::ALERO,
        self::BASE,
        self::ESCOLTA,
        self::PIVOT,
    ];

    public static function isValidRole(string $role): bool
    {
        return Assertion::inArray($role, self::VALID_ROLES);
    }

}
