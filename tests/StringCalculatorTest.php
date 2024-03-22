<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Root\App\Classes\StringCalculator;


final class StringCalculatorTest extends TestCase
{

    public function testEmptyStringReturnZero()
    {
        $res = StringCalculator::add('');
        $this->assertSame(0, $res);
    }

    public function testAddMethodReturnOneDigit()
    {
        $res = StringCalculator::add('1');
        $this->assertSame(1, $res);
    }

    public function testAddMethodReturnTwoDigits()
    {
        $res = StringCalculator::add('1,2');
        $this->assertSame(3, $res);
    }

    public function testAddMethodCanHandleUnknownNumberOfDigits()
    {
        $res = StringCalculator::add('1,2,3,4,5');
        $this->assertSame(15, $res);
    }

    public function testAddMethodCanHandleNewLines()
    {
        $res = StringCalculator::add(<<<TEXT
        1\n2,3;4\n5
        TEXT
        );
        $this->assertSame(15, $res);
    }

    public function testAddMethodCanHandleCustomDelimiter()
    {
        $res = StringCalculator::add(<<<TEXT
         //;
         1;2
         TEXT
        );
        $this->assertSame(3, $res);
    }

    public function testAddMethodCannotHandleNegativeNumbers()
    {
        try {
            $res = StringCalculator::add('1;-2:-4;3');
        } catch (\Exception $e) {
            $this->assertSame('negatives not allowed: -2,-4', $e->getMessage());
        }
    }

    public function testAddMethodIgnoresNumbersGreaterThan1000()
    {
        $res = StringCalculator::add('1,1001,2,3');
        $this->assertSame(6, $res);
    }

    public function testAddMethodDelimitersCanBeOfAnyLength()
    {
        $res = StringCalculator::add(<<<TEXT
        //[***]\n1***2***3
        TEXT
        );
        $this->assertSame(6, $res);
    }

    public function testAddMethodCanHandleMultipleDelimiters(){
        $res = StringCalculator::add(<<<TEXT
        //[*][%]\n1*2%3
        TEXT
        );
        $this->assertSame(6, $res);
    }

    public function testAddMethodCanHandleMultipleDelimitersInARow(){
        $res = StringCalculator::add(<<<TEXT
        //[*%*][%**%]\n1*2%3
        TEXT
        );
        $this->assertSame(6, $res);
    }


}