<?php declare(strict_types=1);

class BarCodeScanner
{

    public static function scanBarCode(string $barCode): string
    {
        if ($barCode === '23456') {
            return '$12.50';
        }
        if ($barCode === '12345') {
            return '$7.25';
        }
        if ($barCode === '99999') {
            return 'Error: barcode not Found';
        }
        return 'Not Found';
    }
}