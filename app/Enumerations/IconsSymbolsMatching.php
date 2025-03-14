<?php

namespace App\Enumerations;

enum IconsSymbolsMatching: string
{

    case BITCOIN = 'BTC';

    public static function values($value): string
    {
        return match ($value) {
            self::BITCOIN->value => '',
        };
    }
}
