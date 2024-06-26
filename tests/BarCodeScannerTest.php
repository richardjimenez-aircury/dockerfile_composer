<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Root\App\Classes\BarCodeScanner;

final class BarCodeScannerTest extends TestCase
{
    public function testScannerIsWorking()
    {
        $res= BarCodeScanner::scanBarCode('12345');
        $this->assertSame('$7.25', $res);
    }
    public function testScannerShowsRightPrice(){

        $res= BarCodeScanner::scanBarCode('23456');
        $this->assertSame('$12.50', $res);
    }
    public function testScannerCanNotFindBarCode()
    {
        $res= BarCodeScanner::scanBarCode('99999');
        $this->assertSame('Error: barcode not Found', $res);
    }
    public function testScannerReceivesEmptyBarCode(){
        $res= BarCodeScanner::scanBarCode('');
        $this->assertSame('Error: empty barcode', $res);
    }
    public function testScannerReturnsTheTotalPrice()
    {
        $res =  BarCodeScanner::scanBarCode('12345') . BarCodeScanner::scanBarCode('23456');
        $this->assertSame('$19.75',  $res);
    }
}