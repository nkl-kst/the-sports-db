<?php

namespace NklKst\TheSportsDb\Client\Endpoint;

use Exception;
use NklKst\TheSportsDb\Config\Config;
use NklKst\TheSportsDb\Entity\Event\Livescore;
use NklKst\TheSportsDb\Filter\LivescoreFilter;
use NklKst\TheSportsDb\Util\TestUtils;
use PHPUnit\Framework\TestCase;

class LivescoreEndpointTest extends TestCase
{
    private LivescoreEndpoint $endpoint;

    protected function setUp(): void
    {
        $this->endpoint = new LivescoreEndpoint(new RequestBuilderMock(), new SerializerMock());
        $this->endpoint->setConfig(new Config());
    }

    /**
     * @throws Exception
     */
    public function testNowInstances(): void
    {
        $livescores = $this->endpoint->now();
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
        $livescore = $this->endpoint->now()[0];
        $this->assertSame('livescore.php', $livescore->strProgress);
    }
}
