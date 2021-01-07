<?php

namespace console\commands;

use Symfony\Component\Console\Command\Command;

class ConsoleCommandHelper extends Command
{
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

    public static function convertToRoman($number)
    {
        $numerals = self::NUMERALS;
        $resultRoman = "";
        foreach ($numerals as $key => $value) {
            $resultRoman .= str_repeat($key, $number / $value);
            $number %= $value;
        }
        return $resultRoman;
    }

    public static function convertToArabian($romanX, $romanY, $operator)
    {
        $romans = self::NUMERALS;
        $resultX = 0;
        $resultY = 0;
        $final = null;

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
            $final = $resultX + $resultY;
        }
        if ($operator == '-') {
            $final = $resultX - $resultY;
        }
        return $final;
    }
}