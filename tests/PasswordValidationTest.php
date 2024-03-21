<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once("./Classes/PasswordValidation.php");

final class PasswordValidationTest extends TestCase{

    public function testPasswordIsAtLeastEightCharacters()
    {
        $res = PasswordValidation::verifyPassword('12345678');
        $this->assertSame(true.' Password is valid', $res);
    }
    public function testPasswordContainsAtLeastTwoNumbers()
    {
        $res = PasswordValidation::verifyPassword('secret78');
        $this->assertSame(true.' Password is valid', $res);
    }
}