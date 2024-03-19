<?php declare(strict_types=1);

class StringCalculator
{


    public static function add(string $numbers): int
    {
        if ($numbers === '') {
            return 0;
        }
        #check if contains a non-numeric character
        if (preg_match('[^\d]', $numbers)) {
            $invalidSymbols=['\n', ';', ',', '/'];
            $replaced=str_replace($invalidSymbols, ',', $numbers);
            $divided = explode(',', $replaced);

            $negatives=array_filter($divided, fn($number)=> $number < 0);
            if (count($negatives) > 0) {
                echo "negatives not allowed: ".implode(',', $negatives)." ";
            }
            return (int)array_sum($divided);
        }

        return (int)$numbers;
    }
}
