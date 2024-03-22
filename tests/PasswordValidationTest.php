<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Root\App\Classes\PasswordValidation;

//require_once("./Classes/PasswordValidation.php");

final class PasswordValidationTest extends TestCase
{

    public function testPasswordIsAtLeastEightCharacters()
    {
        $res = PasswordValidation::verifyPassword('12345678Q*');
        $this->assertSame(true . ' Password is valid', $res);
    }

    public function testPasswordContainsAtLeastTwoNumbers()
    {
        $res = PasswordValidation::verifyPassword('8seCret9*');
        $this->assertSame(true . ' Password is valid', $res);
    }

    public function testMethodCanHandleMultipleValidationErrors()
    {
        $res = PasswordValidation::verifyPassword('secret8');
        $messages = [
            'Password must contain at least 8 characters',
            'Password must contain at least two numbers',
            'Password must contain at least one capital letter',
            'Password must contain at least one special character',
        ];

        $this->assertSame(false . implode("\n", $messages), $res);
    }

    public function testPasswordHasAtLeastOneCapitalLetter()
    {
        $res = PasswordValidation::verifyPassword('Secret89*');
        $this->assertSame(true . ' Password is valid', $res);
    }
    public function testPasswordHasAtLeastOneSpecialCharacter(){
        $res = PasswordValidation::verifyPassword('Secret89');
        $this->assertSame(false . 'Password must contain at least one special character', $res);
    }
}