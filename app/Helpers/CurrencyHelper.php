<?php

namespace App\Helpers;

class CurrencyHelper
{

    public static function format(int $value): string
    {
        return number_format($value, 0, '.', ',');
    }
}