<?php

namespace NklKst\TheSportsDb\Filter;

use PHPUnit\Framework\TestCase;

class SearchFilterTest extends TestCase
{
    private SearchFilter $filter;

    protected function setUp(): void
    {
        $this->filter = new SearchFilter();
    }

    public function testSetEventQuery(): void
    {
        $this->assertSame('e=testEvent&', $this->filter->setEventQuery('testEvent')->getQuery());
    }

    public function testSetPlayerQuery(): void
    {
        $this->assertSame('p=testPlayer&', $this->filter->setPlayerQuery('testPlayer')->getQuery());
    }

    public function testSetSeason(): void
    {
        $this->assertSame('s=testSeason&', $this->filter->setSeason('testSeason')->getQuery());
    }

    public function testSetTeamQuery(): void
    {
        $this->assertSame('t=testTeam&', $this->filter->setTeamQuery('testTeam')->getQuery());
    }

    public function testSetTeamShortQuery(): void
    {
        $this->assertSame(
            'sname=testTeamShort&',
            $this->filter->setTeamShortQuery('testTeamShort')->getQuery());
    }
}
