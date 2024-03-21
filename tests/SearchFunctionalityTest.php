<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once('./Classes/CitySearch.php');
final class SearchFunctionalityTest extends TestCase
{
    public function testSearchTextIsLongerThanTwoCharacters(){
        $res=CitySearch::searchText('a');
        $this->assertSame(null, $res);
    }
}