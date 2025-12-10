<?php

namespace App\Services;

class NumberService
{
    /**
     * Format the given number according to the current locale.
     */
    public static function format($number, $decimals = 0, $decimalPoint = null, $thousandsSeparator = null)
    {
        if (is_null($decimalPoint)) {
            $decimalPoint = '.';
        }

        if (is_null($thousandsSeparator)) {
            $thousandsSeparator = ' ';
        }

        return number_format($number, $decimals, $decimalPoint, $thousandsSeparator);
    }
}
