<?php

namespace NklKst\TheSportsDb\Filter;

use PHPUnit\Framework\TestCase;

class ListFilterTest extends TestCase
{
    private ListFilter $filter;

    protected function setUp(): void
    {
        $this->filter = new ListFilter();
    }

    public function testSetCountryQuery(): void
    {
        $this->assertSame('c=testCountry&', $this->filter->setCountryQuery('testCountry')->getQuery());
    }

    public function testSetLeagueQuery(): void
    {
        $this->assertSame('l=testLeague&', $this->filter->setLeagueQuery('testLeague')->getQuery());
    }

    public function testSetSportQuery(): void
    {
        $this->assertSame('s=testSport&', $this->filter->setSportQuery('testSport')->getQuery());
    }

    public function testSetUser(): void
    {
        $this->assertSame('u=testUser&', $this->filter->setUser('testUser')->getQuery());
    }
}
