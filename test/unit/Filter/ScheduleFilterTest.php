<?php

namespace NklKst\TheSportsDb\Filter;

use PHPUnit\Framework\TestCase;

class ScheduleFilterTest extends TestCase
{
    private ScheduleFilter $filter;

    protected function setUp(): void
    {
        $this->filter = new ScheduleFilter();
    }

    public function testSetRound(): void
    {
        $this->assertSame('r=1&', $this->filter->setRound(1)->getQuery());
    }

    public function testSetSeason(): void
    {
        $this->assertSame('s=testSeason&', $this->filter->setSeason('testSeason')->getQuery());
    }
}
