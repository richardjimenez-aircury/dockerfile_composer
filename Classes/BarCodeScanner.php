<?php declare(strict_types=1);

class BarCodeScanner
{

    public static function scanBarCode(string $barCode): string
    {

        $totalPrice = 0; // Initialize the total price variable

        if ($barCode === '23456') {
            $totalPrice += 12.50; // Add the price to the total
        }

        if ($barCode === '12345') {
            $totalPrice += 7.25; // Add the price to the total
        }

        if ($barCode === '99999') {
            return 'Error: barcode not Found';
        }

        $infoToShow = '$' . $totalPrice; // Format the total price

        if (str_contains($infoToShow, 'Error')) {
            $infoToShow = preg_replace('/[^a-zA-Z: ]/', '', $infoToShow);
        }

        return empty($totalPrice) ? 'Error: empty barcode' : (string)$infoToShow;
    }

}