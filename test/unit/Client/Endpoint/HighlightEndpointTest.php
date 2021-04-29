<?php

namespace NklKst\TheSportsDb\Client\Endpoint;

use DateTime;
use Exception;
use NklKst\TheSportsDb\Config\Config;
use NklKst\TheSportsDb\Entity\Event\Highlight;
use NklKst\TheSportsDb\Filter\HighlightFilter;
use NklKst\TheSportsDb\Request\RequestBuilder;
use NklKst\TheSportsDb\Util\TestUtils;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NklKst\TheSportsDb\Client\Endpoint\HighlightEndpoint
 */
class HighlightEndpointTest extends TestCase
{
    private HighlightEndpoint $endpoint;

    private MockObject $requestBuilderMock;

    protected function setUp(): void
    {
        $this->endpoint = new HighlightEndpoint(
            $this->requestBuilderMock = $this->createMock(RequestBuilder::class),
            new SerializerMock());
        $this->endpoint->setConfig(new Config());
    }

    /**
     * @throws Exception
     */
    public function testLatestInstances(): void
    {
        $highlights = $this->endpoint->latest();

        $this->assertNotEmpty($highlights);
        $this->assertContainsOnlyInstancesOf(Highlight::class, $highlights);
    }

    /**
     * @throws Exception
     */
    public function testLatestFilterDay(): void
    {
        $this->endpoint->latest(new DateTime('2014-10-10'));

        $this->assertEquals(
            (new HighlightFilter())->setDay(new DateTime('2014-10-10')),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testLatestFilterLeague(): void
    {
        $this->endpoint->latest(null, 'testLeague');

        $this->assertEquals(
            (new HighlightFilter())->setLeague('testLeague'),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testLatestFilterSportQuery(): void
    {
        $this->endpoint->latest(null, null, 'testSportQuery');

        $this->assertEquals(
            (new HighlightFilter())->setSportQuery('testSportQuery'),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testLatestEndpoint(): void
    {
        TestUtils::expectEndpoint($this->requestBuilderMock, 'eventshighlights.php');
        $this->endpoint->latest();
    }
}
