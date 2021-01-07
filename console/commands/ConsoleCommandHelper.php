<?php

namespace console\commands;

use Symfony\Component\Console\Command\Command;

/**
 * Class ConsoleCommandHelper
 * Methods of convert using in ConsoleCalculate
 * @package console\commands
 */
class ConsoleCommandHelper extends Command
{
    /**
     * Map for convert methods
     */
    const NUMERALS = [
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1
    ];

    /**
     * Convert arabian numeral to roman.
     * @param $number
     * @return string
     */
    public static function convertToRoman($number)
    {
        $numerals = self::NUMERALS;
        $result = "";

        foreach ($numerals as $key => $value) {
            $result .= str_repeat($key, $number / $value);
            $number %= $value;
        }

        return $result;
    }

    /**
     * Converting roman numeral to arabian, and next step calculate.
     * @param $romanX
     * @param $romanY
     * @param $operator
     * @return int|null
     */
    public static function convertToArabianAndCalculate($romanX, $romanY, $operator)
    {
        $romans = self::NUMERALS;
        $resultX = 0;
        $resultY = 0;
        $result = null;

        foreach ($romans as $key => $value) {
            while (strpos($romanX, $key) === 0) {
                $resultX += $value;
                $romanX = substr($romanX, strlen($key));
            }
        }

        foreach ($romans as $key => $value) {
            while (strpos($romanY, $key) === 0) {
                $resultY += $value;
                $romanY = substr($romanY, strlen($key));
            }
        }

        if ($operator == '+') {
            $result = $resultX + $resultY;
        }

        if ($operator == '-') {
            $result = $resultX - $resultY;
        }

        return $result;
    }

}