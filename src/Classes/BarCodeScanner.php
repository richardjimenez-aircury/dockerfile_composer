<?php declare(strict_types=1);

namespace Root\App\Classes;
class BarCodeScanner
{

    public static function scanBarCode(string ...$barCodes): string
    {
        $totalPrice = 0;
        foreach ($barCodes as $barCode) {
            if ($barCode === '12345') {
                $totalPrice += 7.25;
            }
            if ($barCode === '23456') {
                $totalPrice += 12.50;
            }
            if($barCode === '99999') {
                return 'Error: barcode not Found';
            }
        }
        return $totalPrice === 0 ? 'Error: empty barcode' : '$' . number_format($totalPrice, 2);
    }

}