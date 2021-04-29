<?php

namespace NklKst\TheSportsDb\Client;

use NklKst\TheSportsDb\Client\Endpoint\HighlightEndpoint;
use NklKst\TheSportsDb\Client\Endpoint\ListEndpoint;
use NklKst\TheSportsDb\Client\Endpoint\LivescoreEndpoint;
use NklKst\TheSportsDb\Client\Endpoint\LookupEndpoint;
use NklKst\TheSportsDb\Client\Endpoint\ScheduleEndpoint;
use NklKst\TheSportsDb\Client\Endpoint\SearchEndpoint;
use NklKst\TheSportsDb\Config\Config;
use NklKst\TheSportsDb\Request\RequestBuilder;
use NklKst\TheSportsDb\Serializer\Serializer;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NklKst\TheSportsDb\Client\Client
 */
class ClientTest extends TestCase
{
    private Client $client;

    protected function setUp(): void
    {
        $requestBuilder = $this->createStub(RequestBuilder::class);
        $serializer = $this->createStub(Serializer::class);

        $highlight = new HighlightEndpoint($requestBuilder, $serializer);
        $list = new ListEndpoint($requestBuilder, $serializer);
        $livescore = new LivescoreEndpoint($requestBuilder, $serializer);
        $lookup = new LookupEndpoint($requestBuilder, $serializer);
        $schedule = new ScheduleEndpoint($requestBuilder, $serializer);
        $search = new SearchEndpoint($requestBuilder, $serializer);

        $this->client = new Client($highlight, $list, $livescore, $lookup, $schedule, $search);
    }

    public function testConfigure(): void
    {
        $this->assertInstanceOf(Config::class, $this->client->configure());
    }

    public function testHighlight(): void
    {
        $this->assertInstanceOf(HighlightEndpoint::class, $this->client->highlight());
    }

    public function testList(): void
    {
        $this->assertInstanceOf(ListEndpoint::class, $this->client->list());
    }

    public function testLivescore(): void
    {
        $this->assertInstanceOf(LivescoreEndpoint::class, $this->client->livescore());
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
