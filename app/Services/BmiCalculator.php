<?php

namespace App\Services;

class BmiCalculator
{
    public static function calculate(float $weight, float $height): float
    {
        $heightInMeters = $height / 100;
        return round($weight / ($heightInMeters * $heightInMeters), 1);
    }

    public static function category(float $bmi): string
    {
        if ($bmi < 18.5) {
            return 'Kurus';
        } elseif ($bmi < 25) {
            return 'Normal';
        } elseif ($bmi < 30) {
            return 'Overweight';
        } else {
            return 'Obesitas';
        }
    }
}
