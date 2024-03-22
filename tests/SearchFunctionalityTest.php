<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once('./Classes/CitySearch.php');
final class SearchFunctionalityTest extends TestCase
{
    public function testSearchTextIsShorterThanTwoCharacters(){
        $res=CitySearch::searchText('a');
        $this->assertSame(null, $res);
    }
    public function testSearchTextIsEqualToOrLongerThanTwoCharacters()
    {
        $res=CitySearch::searchText('Va');
        $this->assertSame(['Valencia', 'Vancouver'], $res);
    }
}