<?php

namespace NklKst\TheSportsDb\Filter;

use DateTime;
use PHPUnit\Framework\TestCase;

class ScheduleFilterTest extends TestCase
{
    private ScheduleFilter $filter;

    protected function setUp(): void
    {
        $this->filter = new ScheduleFilter();
    }

    public function testSetDay(): void
    {
        $this->assertSame(
            'd=2014-10-10&', $this->filter->setDay(new DateTime('2014-10-10'))->getQuery());
    }

    public function testSetLeagueQuery(): void
    {
        $this->assertSame(
            'l=testLeagueQuery&', $this->filter->setLeagueQuery('testLeagueQuery')->getQuery());
    }

    public function testSetRound(): void
    {
        $this->assertSame('r=1&', $this->filter->setRound(1)->getQuery());
    }

    public function testSetSeason(): void
    {
        $this->assertSame('s=testSeason&', $this->filter->setSeason('testSeason')->getQuery());
    }

    public function testSetSportQuery(): void
    {
        $this->assertSame(
            's=testSportQuery&', $this->filter->setSportQuery('testSportQuery')->getQuery());
    }
}
