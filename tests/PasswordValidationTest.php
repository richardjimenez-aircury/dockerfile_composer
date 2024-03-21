<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once("./Classes/PasswordValidation.php");

final class PasswordValidationTest extends TestCase
{

    public function testPasswordIsAtLeastEightCharacters()
    {
        $res = PasswordValidation::verifyPassword('12345678');
        $this->assertSame(true . ' Password is valid', $res);
    }

    public function testPasswordContainsAtLeastTwoNumbers()
    {
        $res = PasswordValidation::verifyPassword('secret89');
        $this->assertSame(true . ' Password is valid', $res);
    }

    public function testMethodCanHandleMultipleValidationErrors()
    {
        $res = PasswordValidation::verifyPassword('secret');
        $this->assertSame(false . "Password must contain at least 8 characters \nPassword must contain at least two numbers \n", $res);
    }
}