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
        $res = PasswordValidation::verifyPassword('8secret9');
        $this->assertSame(true . ' Password is valid', $res);
    }

    public function testMethodCanHandleMultipleValidationErrors()
    {
        $res = PasswordValidation::verifyPassword('secr8el');
        $messages = [
            'Password must contain at least 8 characters',
            'Password must contain at least two numbers'
        ];

        $this->assertSame(false . implode("\n", $messages), $res);
    }
}