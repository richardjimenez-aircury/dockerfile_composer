<?php declare(strict_types=1);

class PasswordValidation
{
    public static function verifyPassword(string $password): bool|string
    {
        $errors = [];

        if (strlen($password) < 8) {
            $errors[] = "Password must contain at least 8 characters";
        }

        if (preg_match('/\d/', $password)) {
            $numbers = preg_replace('/\D*/', '&', $password);
            $divided= explode('&', $numbers);
            $numbersAlone=array_filter($divided, fn($number) => $number !== '');
            if (count($numbersAlone) < 2) {
                $errors[] = "Password must contain at least two numbers";
            }
        }

        if (!(preg_match('/[A-Z]+/', $password))){
            $errors[]= 'Password must contain at least one capital letter';
        }



        return empty($errors) ? true . ' Password is valid' : false . implode("\n", $errors);
    }
}