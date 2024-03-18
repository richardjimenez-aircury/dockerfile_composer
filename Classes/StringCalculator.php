<?php declare(strict_types=1);

class StringCalculator
{


    public static function add(string $numbers): int
    {
        if ($numbers === '') {
            return 0;
        }
        if (preg_match('[^0-9]', $numbers)) {
            $numbers = preg_replace('[,/\n;]', '&', $numbers);
            $arr = explode('&', $numbers);
            return array_sum($arr);
        }

        return (int)$numbers;
    }
}
