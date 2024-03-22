<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Root\App\Classes\CitySearch;
//
//require_once('./Classes/CitySearch.php');

final class CitySearchTest extends TestCase
{
    public function testSearchTextIsShorterThanTwoCharacters()
    {
        $res = CitySearch::searchText('a');
        $this->assertSame(null, $res);
    }

    public function testSearchTextIsEqualToOrLongerThanTwoCharacters()
    {
        $res = CitySearch::searchText('Va');
        $this->assertSame(['Valencia', 'Vancouver'], $res);
    }

    public function testSearchTextIsNotCaseSensitive()
    {
        $res = CitySearch::searchText('va');
        $this->assertSame(['Valencia', 'Vancouver'], $res);
    }

    public function testSearchTextIsJustAPartOfTheCityName()
    {
        $res = CitySearch::searchText('dam');
        $this->assertSame(['Rotterdam', 'Amsterdam'], $res);
    }
    public function testSearchTextIsAnAsterisk()
    {
        $res= CitySearch::searchText('*');
        $this->assertSame(['Paris', 'Budapest', 'Skopje', 'Rotterdam', 'Valencia', 'Vancouver', 'Amsterdam', 'Vienna', 'Sydney', 'New York City', 'London', 'Bangkok', 'Hong Kong', 'Dubai', 'Rome', 'Istanbul'], $res);
    }
}