<?php

namespace NklKst\TheSportsDb\Client\Endpoint;

use Exception;
use NklKst\TheSportsDb\Config\Config;
use NklKst\TheSportsDb\Entity\Event\Livescore;
use NklKst\TheSportsDb\Filter\LivescoreFilter;
use NklKst\TheSportsDb\Request\RequestBuilder;
use NklKst\TheSportsDb\Util\TestUtils;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NklKst\TheSportsDb\Client\Endpoint\LivescoreEndpoint
 */
class LivescoreEndpointTest extends TestCase
{
    private LivescoreEndpoint $endpoint;

    private MockObject $requestBuilderMock;

    protected function setUp(): void
    {
        $this->endpoint = new LivescoreEndpoint(
            $this->requestBuilderMock = $this->createMock(RequestBuilder::class),
            new SerializerMock());
        $this->endpoint->setConfig(new Config());
    }

    /**
     * @throws Exception
     */
    public function testNowInstances(): void
    {
        $livescores = $this->endpoint->now();

        $this->assertNotEmpty($livescores);
        $this->assertContainsOnlyInstancesOf(Livescore::class, $livescores);
    }

    /**
     * @throws Exception
     */
    public function testNowFilterLeagueID(): void
    {
        $this->endpoint->now(null, 1);

        $this->assertEquals(
            (new LivescoreFilter())->setSport('')->setLeagueID(1),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testNowFilterSport(): void
    {
        $this->endpoint->now('testSport');

        $this->assertEquals(
            (new LivescoreFilter())->setSport('testSport'),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testNowEndpoint(): void
    {
        TestUtils::expectEndpoint($this->requestBuilderMock, 'livescore.php');
        $this->endpoint->now();
    }
}
