<?php

namespace App\Services;

use Illuminate\Support\Number as BaseNumber;

class NumberService extends BaseNumber
{
    /**
     * Format the given number according to the current locale.
     *
     * @param  int|float  $number
     * @param  int  $decimals
     * @param  string|null  $decimalPoint
     * @param  string|null  $thousandsSeparator
     * @return string
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
