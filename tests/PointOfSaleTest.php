<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once('./Classes/BarCodeScanner.php');
final class PointOfSaleTest extends TestCase
{
    public function testScannerIsWorking()
    {
        $res= BarCodeScanner::scanBarCode(12345);
        $this->assertSame('$7.25', $res);
    }
    public function testScannerShowsRightPrice(){
        $res= BarCodeScanner::scanBarCode(23456);
        $this->assertSame('$12.50', $res);
    }
}