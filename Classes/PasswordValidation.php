<?php declare(strict_types=1);

class PasswordValidation
{
    public static function verifyPassword(string $password): bool|string
    {
        if (strlen($password) < 8) {
            $error= false . ' Password must contain at least 8 characters';
        }

        return $error ?? true . ' Password is valid';
    }
}