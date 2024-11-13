<?php

namespace App\Enums;

enum UserRoleEnum: string
{
    case Admin = 'admin';
    case User = 'user';

    public static function getValues(): array
    {
        return [
            self::Admin->value,
            self::User->value,
        ];
    }
}
