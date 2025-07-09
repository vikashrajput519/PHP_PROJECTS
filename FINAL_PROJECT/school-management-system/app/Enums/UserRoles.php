<?php

namespace App\Enums;

enum UserRoles: string
{
    case STUDENT = 'STUDENT';
    case STAFF = 'STAFF';
    case ADMIN = 'ADMIN';

    public static function all(): array
    {
        return array_column(self::cases(), 'value');
    }
}