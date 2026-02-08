<?php

namespace App\Enums;

enum TypeOptions: string
{
    case PRIVATE = 'private';
    case PUBLIC = 'public';

    public static function getAllOptions(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }

    public static function getSelectOptions(): array
    {
        return [
            self::PRIVATE->value => 'Private',
            self::PUBLIC->value => 'Public',
        ];
    }
}
