<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once ("./Classes/StringCalculator.php");

final class StringCalculatorTest extends TestCase
{

    public function testEmptyStringReturnZero()
    {
        $res = StringCalculator::add('');
        $this->assertSame(0, $res);
    }

    public function testStringReturnOneDigit()
    {
        $res=StringCalculator::add('1');
        $this->assertSame(1, $res);
    }

    public function testStringReturnTwoDigits()
    {
        $res=StringCalculator::add('1,2');
        $this->assertSame(3, $res);
    }

    public function testAddMethodCanHandleUnknownNumberOfDigits(){
        $res=StringCalculator::add('1,2,3,4,5');
        $this->assertSame(15, $res);
    }

    public function testAddMethodCanHandleNewLines(){
        $res=StringCalculator::add("1\n2,3,4\n5");
        $this->assertSame(15, $res);
    }

    public function testAddMethodCanHandleCustomDelimiter(){
        $res=StringCalculator::add("//;\n1;2\n3;4");
        $this->assertSame(10, $res);
    }

    public function testAddMethodCannotHandleNegativeNumbers(){
        $res=StringCalculator::add("-1,2");
        $this->assertSame(-1, $res);    
    }
    
}