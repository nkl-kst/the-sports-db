<?php

namespace NklKst\TheSportsDb\Filter;

use DateTime;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NklKst\TheSportsDb\Filter\HighlightFilter
 */
class HighlightFilterTest extends TestCase
{
    private HighlightFilter $filter;

    protected function setUp(): void
    {
        $this->filter = new HighlightFilter();
    }

    public function testSetDay(): void
    {
        $this->assertSame(
            'd=2014-10-10&', $this->filter->setDay(new DateTime('2014-10-10'))->getQuery());
    }

    public function testSetLeague(): void
    {
        $this->assertSame(
            'l=testLeague&', $this->filter->setLeague('testLeague')->getQuery());
    }

    public function testSetSportQuery(): void
    {
        $this->assertSame(
            's=testSportQuery&', $this->filter->setSportQuery('testSportQuery')->getQuery());
    }
}
