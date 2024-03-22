<?php declare(strict_types=1);

class BarCodeScanner
{

    public static function scanBarCode(int $barCode): string
    {
        if ($barCode === 23456) {
            return '$12.50';
        }
        if ($barCode === 12345) {
            return '$7.25';
        }
        return 'Not Found';
    }
}