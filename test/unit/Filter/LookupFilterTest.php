<?php

namespace NklKst\TheSportsDb\Filter;

use PHPUnit\Framework\TestCase;

class LookupFilterTest extends TestCase
{
    private LookupFilter $filter;

    protected function setUp(): void
    {
        $this->filter = new LookupFilter();
    }

    public function testSetLeagueID(): void
    {
        $this->assertSame('l=1&', $this->filter->setLeagueID(1)->getQuery());
    }

    public function testSetSeasonQuery(): void
    {
        $this->assertSame('s=testSeason&', $this->filter->setSeason('testSeason')->getQuery());
    }
}
