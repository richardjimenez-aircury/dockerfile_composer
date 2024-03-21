<?php declare(strict_types=1);

class CitySearch
{
    public static function searchText(string $text): ?array
    {
        $cities=['Paris', 'Budapest', 'Skopje', 'Rotterdam', 'Valencia', 'Vancouver', 'Amsterdam', 'Vienna', 'Sydney', 'New York City', 'London', 'Bangkok', 'Hong Kong', 'Dubai', 'Rome', 'Istanbul'];

        if (strlen($text) < 2) {
            return null;
        }else{
            return array_filter($cities, fn($city) => str_contains($city, $text));
        }
    }
}
