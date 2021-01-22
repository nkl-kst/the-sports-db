<?php

namespace NklKst\TheSportsDb\Filter;

use PHPUnit\Framework\TestCase;

class LivescoreFilterTest extends TestCase
{
    private LivescoreFilter $filter;

    protected function setUp(): void
    {
        $this->filter = new LivescoreFilter();
    }

    public function testSetLeagueID(): void
    {
        $this->assertSame(
            'l=1&', $this->filter->setLeagueID(1)->getQuery());
    }

    public function testSetSport(): void
    {
        $this->assertSame(
            's=testSport&', $this->filter->setSport('testSport')->getQuery());
    }
}
