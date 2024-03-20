<?php declare(strict_types=1);

use function PHPUnit\Framework\throwException;

class StringCalculator
{


    /**
     * @throws Exception
     */
    public static function add(string $numbers): int
    {
        if ($numbers === '') {
            return 0;
        }

        if (preg_match('/\D*/', $numbers)) {
            $invalidSymbols = ["\n", ';', '/', ' ',':'];#LAS COMILLAS SIMPLES NO RECONOCEN \n COMO SALTO DE LINEA
            $replaced = str_replace($invalidSymbols, ',', $numbers);

            $divided = explode(',', $replaced);
            $withoutSpaces = array_filter($divided, fn($number) => $number !== '' && $number <= 999);

            #check for negatives
            $negatives = array_filter($withoutSpaces, fn($number) => $number < 0);
            if (count($negatives) > 0) {
                throw new InvalidArgumentException(sprintf('negatives not allowed: %s', implode(',', $negatives)));
                exit();
            }

            return (int)array_sum($withoutSpaces);
        }

        return (int)$numbers;
    }
}
