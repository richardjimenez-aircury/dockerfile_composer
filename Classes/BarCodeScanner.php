<?php declare(strict_types=1);

class BarCodeScanner
{

    public static function scanBarCode(int $barCode): string{
        return $barCode===12345 ? '$7.25' : 'Not Found';
    }
}