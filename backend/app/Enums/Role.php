<?php

namespace App\Enums;

final class Role
{
    public const SUPER_ADMIN = 'SUPER_ADMIN';
    public const ADMIN = 'ADMIN';

    public static function all(): array
    {
        return [
            self::SUPER_ADMIN,
            self::ADMIN,
        ];
    }
}
