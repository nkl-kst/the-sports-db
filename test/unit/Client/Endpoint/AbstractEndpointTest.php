<?php

namespace NklKst\TheSportsDb\Client\Endpoint;

use NklKst\TheSportsDb\Config\Config;
use NklKst\TheSportsDb\Filter\ListFilter;
use NklKst\TheSportsDb\Request\RequestBuilder;
use NklKst\TheSportsDb\Util\TestUtils;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NklKst\TheSportsDb\Client\Endpoint\AbstractEndpoint
 */
class AbstractEndpointTest extends TestCase
{
    private ListEndpoint $endpoint;

    private MockObject $requestBuilderMock;

    protected function setUp(): void
    {
        $this->endpoint = new ListEndpoint(
            $this->requestBuilderMock = $this->createMock(RequestBuilder::class),
            new SerializerMock());
        $this->endpoint->setConfig(new Config());
    }

    public function testSetConfig(): void
    {
        $this->endpoint->setConfig((new Config())->setKey('testKey'));
        $this->assertEquals(
            (new Config())->setKey('testKey'),
            TestUtils::getHiddenProperty($this->endpoint, 'config'));
    }

    public function testSetFilter(): void
    {
        $setFilter = TestUtils::getHiddenMethod($this->endpoint, 'setFilter');
        $setFilter((new ListFilter())->setCountryQuery('testCountryQuery'));

        $this->assertEquals(
            (new ListFilter())->setCountryQuery('testCountryQuery'),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    public function testRequest(): void
    {
        $request = TestUtils::getHiddenMethod($this->endpoint, 'request');

        $this->requestBuilderMock
            ->expects($this->once())
            ->method('request');
        $request();
    }

    public function testRequestKey(): void
    {
        $request = TestUtils::getHiddenMethod($this->endpoint, 'request');

        $this->endpoint->setConfig((new Config())->setKey('testKey'));

        $this->requestBuilderMock
            ->expects($this->once())
            ->method('setKey')
            ->with('testKey');
        $request();
    }

    public function testRequestFilter(): void
    {
        $setFilter = TestUtils::getHiddenMethod($this->endpoint, 'setFilter');
        $request = TestUtils::getHiddenMethod($this->endpoint, 'request');

        $setFilter(new ListFilter());

        $this->requestBuilderMock
            ->expects($this->once())
            ->method('setQuery');
        $request();
    }

    public function testGetSingleEntity(): void
    {
        $getSingleEntity = TestUtils::getHiddenMethod($this->endpoint, 'getSingleEntity');
        $this->assertSame('first', $getSingleEntity(['first', 'second', 'third']));
    }

    public function testGetSingleEntityEmpty(): void
    {
        $getSingleEntity = TestUtils::getHiddenMethod($this->endpoint, 'getSingleEntity');
        $this->assertNull($getSingleEntity([]));
    }
}
