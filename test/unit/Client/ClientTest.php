<?php

namespace NklKst\TheSportsDb\Client;

use NklKst\TheSportsDb\Client\Endpoint\ListEndpoint;
use NklKst\TheSportsDb\Client\Endpoint\LookupEndpoint;
use NklKst\TheSportsDb\Client\Endpoint\RequestBuilderMock;
use NklKst\TheSportsDb\Client\Endpoint\ScheduleEndpoint;
use NklKst\TheSportsDb\Client\Endpoint\SearchEndpoint;
use NklKst\TheSportsDb\Client\Endpoint\SerializerMock;
use NklKst\TheSportsDb\Config\Config;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    private Client $client;

    protected function setUp(): void
    {
        $requestBuilder = new RequestBuilderMock();
        $serializer = new SerializerMock();

        $list = new ListEndpoint($requestBuilder, $serializer);
        $lookup = new LookupEndpoint($requestBuilder, $serializer);
        $schedule = new ScheduleEndpoint($requestBuilder, $serializer);
        $search = new SearchEndpoint($requestBuilder, $serializer);

        $this->client = new Client($list, $lookup, $schedule, $search);
    }

    public function testConfigure(): void
    {
        $this->assertInstanceOf(Config::class, $this->client->configure());
    }

    public function testList(): void
    {
        $this->assertInstanceOf(ListEndpoint::class, $this->client->list());
    }

    public function testLookup(): void
    {
        $this->assertInstanceOf(LookupEndpoint::class, $this->client->lookup());
    }

    public function testSchedule(): void
    {
        $this->assertInstanceOf(ScheduleEndpoint::class, $this->client->schedule());
    }

    public function testSearch(): void
    {
        $this->assertInstanceOf(SearchEndpoint::class, $this->client->search());
    }
}
