<?php declare(strict_types=1);

namespace Root\App\Classes;
class BarCodeScanner
{

    public static function scanBarCode(string $barCode): string
    {
        $totalPrice = 0;

        if ($barCode === '23456') {
            $totalPrice += 12.50;
        }

        if ($barCode === '12345') {
            $totalPrice += 7.25;
        }

        if ($barCode === '99999') {
            return 'Error: barcode not Found';
        }

        $infoToShow = '$' . $totalPrice;

//        if (str_contains($infoToShow, 'Error')) {
//            $infoToShow = preg_replace('/[^a-zA-Z: ]/', '', $infoToShow);
//        }

        return $totalPrice === 0 ? 'Error: empty barcode' : (string)$infoToShow;
    }

}