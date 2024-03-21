<?php declare(strict_types=1);

class PasswordValidation
{
    public static function verifyPassword(string $password): bool|string
    {
        $error = '';
        if (strlen($password) < 8) {
            $error .= "Password must contain at least 8 characters \n";
        }

        if (preg_match('/\d*/', $password)) {
            $numbers = preg_replace('/\D*/', '&', $password);
            if (count(explode('&', $numbers)) < 2) {
                $error .= "Password must contain at least two numbers \n";
            }
        }

        return $error === '' ? true . ' Password is valid' : false . $error;
    }
}