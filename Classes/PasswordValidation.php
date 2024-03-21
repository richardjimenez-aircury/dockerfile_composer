<?php declare(strict_types=1);

class PasswordValidation
{
    public static function verifyPassword(string $password): bool|string
    {
        if (strlen($password) < 8) {
            $error= false . ' Password must contain at least 8 characters';
        }
        if (preg_match('/\d*/', $password)) {
            $numbers= preg_replace('/\D*/', '&', $password);
            if (count(explode('&', $numbers)) < 2) {
                $error= false . ' Password must contain at least two numbers';
            }
        }
        return $error ?? true . ' Password is valid';
    }
}