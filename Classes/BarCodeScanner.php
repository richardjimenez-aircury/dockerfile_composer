<?php declare(strict_types=1);

class BarCodeScanner
{

    public static function scanBarCode(string $barCode): string
    {
        $bill=[];
        if ($barCode === '23456') {
            $bill[]= '12.50';
        }
        if ($barCode === '12345') {
            $bill[]= '7.25';
        }
        if ($barCode === '99999') {
            $bill[]= 'Error: barcode not Found';
        }

        $infoToShow='$'.implode('', $bill);
        if (str_contains($infoToShow, 'Error')) {
            $infoToShow=preg_replace('/[^a-zA-Z: ]/', '', $infoToShow);
        }
//        else{
//            $infoToShow = preg_replace('/[^0-9.]/', '', $infoToShow);
//            $infoToShow = array_map('floatval', explode('$', $infoToShow));
//            $infoToShow = array_sum($infoToShow);
//        }
        return empty($bill) ? 'Error: empty barcode' : (string)$infoToShow;
    }
}