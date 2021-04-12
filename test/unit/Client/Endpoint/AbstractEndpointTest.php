<?php

namespace NklKst\TheSportsDb\Client\Endpoint;

use NklKst\TheSportsDb\Config\Config;
use NklKst\TheSportsDb\Filter\ListFilter;
use NklKst\TheSportsDb\Util\TestUtils;
use PHPUnit\Framework\TestCase;

class AbstractEndpointTest extends TestCase
{
    private ListEndpoint $endpoint;

    protected function setUp(): void
    {
        $this->endpoint = new ListEndpoint(new RequestBuilderMock(), new SerializerMock());
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
        $this->assertEquals('dummyEndpoint', $request());
    }

    public function testRequestKey(): void
    {
        $this->endpoint->setConfig((new Config())->setKey('testKey'));

        $request = TestUtils::getHiddenMethod($this->endpoint, 'request');
        $request();

        $requestBuilder = TestUtils::getHiddenProperty($this->endpoint, 'requestBuilder');
        $this->assertEquals('testKey', $requestBuilder->key);
    }

    public function testRequestFilter(): void
    {
        $setFilter = TestUtils::getHiddenMethod($this->endpoint, 'setFilter');
        $setFilter((new ListFilter())->setCountryQuery('testQuery'));

        $request = TestUtils::getHiddenMethod($this->endpoint, 'request');
        $request();

        $requestBuilder = TestUtils::getHiddenProperty($this->endpoint, 'requestBuilder');
        $this->assertEquals('c=testQuery&', $requestBuilder->query);
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
