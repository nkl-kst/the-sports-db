<?php

namespace NklKst\TheSportsDb\Filter;

use PHPUnit\Framework\TestCase;

class AbstractFilterTest extends TestCase
{
    private ListFilter $filter;

    protected function setUp(): void
    {
        $this->filter = new ListFilter();
    }

    public function testSetID(): void
    {
        $this->assertSame('id=1&', $this->filter->setID(1)->getQuery());
    }
}
