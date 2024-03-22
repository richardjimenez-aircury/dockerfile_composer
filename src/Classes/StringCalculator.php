<?php declare(strict_types=1);

namespace Root\App\Classes;

use function PHPUnit\Framework\throwException;

class StringCalculator
{

    /**
     * @throws \Exception
     */
    public static function add(string $numbers): int
    {
        if ($numbers === '') {
            return 0;
        }

        if (preg_match('/\D*/', $numbers)) {
            $invalidSymbols = [PHP_EOL, ';', '/', ' ', ':', '*','%', '[', ']'];#LAS COMILLAS SIMPLES NO RECONOCEN \n COMO SALTO DE LINEA
            $replaced = str_replace($invalidSymbols, ',', $numbers);

            $divided = explode(',', $replaced);
            $withoutSpaces = array_filter($divided, fn($number) => $number !== '' && $number <= 1000);

            #check for negatives
            $negatives = array_filter($withoutSpaces, fn($number) => $number < 0);
            if (count($negatives) > 0) {
                $negativesString = implode(',', $negatives);
                throw new \InvalidArgumentException("negatives not allowed: $negativesString");
            }

            return (int)array_sum($withoutSpaces);
        }

        return (int)$numbers;
    }
}

