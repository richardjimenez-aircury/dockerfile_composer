<?php declare(strict_types=1);

class StringCalculator
{


    public static function add(string $numbers): int
    {
        if ($numbers === '') {
            return 0;
        }

        if (preg_match('[^\d]', $numbers)) {
            $invalidSymbols=['\n', ';', ',', '/'];
            $replaced=str_replace($invalidSymbols, ',', $numbers);
            $divided = explode(',', $replaced);

            #check for negatives
            $negatives=array_filter($divided, fn($number)=> $number < 0);
            if (count($negatives) > 0) {
                throwException("negatives not allowed: ".implode(',', $negatives)." ");
            }

            return (int)array_sum($divided);
        }

//        if (preg_match('/[^\d,]/', $numbers)) {
//            $divided = preg_split('/\D+/', $numbers);
//            var_dump($divided);
//            $sum = 0;
//
//            $negatives = [];
//            foreach ($divided as $number) {
//                $num = (int) $number;
//                if($num == null){
//                    $num = 0;
//                }
//                if ($num < 0) {
//                    $negatives[] = $num;
//                } else {
//                    $sum += $num;
//                }
//            }
//
//            if (!empty($negatives)) {
//                throwException("negatives not allowed: " . implode(',', $negatives));
//            }
//            return $sum;
//        }

        return (int)$numbers;
    }
}
