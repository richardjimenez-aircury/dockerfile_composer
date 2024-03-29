<?php declare(strict_types=1);

namespace Root\App\Classes;
class CitySearch
{
    public static function searchText(string $text): ?array
    {
        $cities = ['Paris', 'Budapest', 'Skopje', 'Rotterdam', 'Valencia', 'Vancouver', 'Amsterdam', 'Vienna', 'Sydney', 'New York City', 'London', 'Bangkok', 'Hong Kong', 'Dubai', 'Rome', 'Istanbul'];

        if (strlen($text) < 2 && $text !== '*') {
            return null;
        }

        if ($text === '*') {
            return $cities;
        }

        return array_values(array_filter($cities, fn($city) => str_contains(strtolower($city), strtolower($text))));
    }
}
