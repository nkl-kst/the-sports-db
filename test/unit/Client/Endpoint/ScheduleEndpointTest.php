<?php

namespace NklKst\TheSportsDb\Client\Endpoint;

use Exception;
use NklKst\TheSportsDb\Config\Config;
use NklKst\TheSportsDb\Entity\Event\Event;
use NklKst\TheSportsDb\Filter\ScheduleFilter;
use NklKst\TheSportsDb\Util\TestUtils;
use PHPUnit\Framework\TestCase;

class ScheduleEndpointTest extends TestCase
{
    private ScheduleEndpoint $endpoint;

    protected function setUp(): void
    {
        $this->endpoint = new ScheduleEndpoint(new RequestBuilderMock(), new SerializerMock());
        $this->endpoint->setConfig(new Config());
    }

    /**
     * @throws Exception
     */
    public function testLeagueNextEndpoint(): void
    {
        $event = $this->endpoint->leagueNext(1)[0];
        $this->assertSame('eventsnextleague.php', $event->strEvent);
    }

    /**
     * @throws Exception
     */
    public function testLeagueNextFilterLeague(): void
    {
        $this->endpoint->leagueNext(1);

        $this->assertEquals(
            (new ScheduleFilter())->setID(1),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testLeagueNextInstances(): void
    {
        $events = $this->endpoint->leagueNext(1);
        $this->assertContainsOnlyInstancesOf(Event::class, $events);
    }

    /**
     * @throws Exception
     */
    public function testLeagueLastEndpoint(): void
    {
        $event = $this->endpoint->leagueLast(1)[0];
        $this->assertSame('eventspastleague.php', $event->strEvent);
    }

    /**
     * @throws Exception
     */
    public function testLeagueLastFilterLeague(): void
    {
        $this->endpoint->leagueLast(1);

        $this->assertEquals(
            (new ScheduleFilter())->setID(1),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testLeagueLastInstances(): void
    {
        $events = $this->endpoint->leagueLast(1);
        $this->assertContainsOnlyInstancesOf(Event::class, $events);
    }

    /**
     * @throws Exception
     */
    public function testRoundEndpoint(): void
    {
        $event = $this->endpoint->round(1, 2)[0];
        $this->assertSame('eventsround.php', $event->strEvent);
    }

    /**
     * @throws Exception
     */
    public function testRoundFilterLeagueRound(): void
    {
        $this->endpoint->round(1, 2);

        $this->assertEquals(
            (new ScheduleFilter())->setID(1)->setRound(2),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testRoundFilterSeason(): void
    {
        $this->endpoint->round(1, 2, 'testSeason');

        $this->assertEquals(
            (new ScheduleFilter())->setID(1)->setRound(2)->setSeason('testSeason'),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testRoundInstances(): void
    {
        $events = $this->endpoint->round(1, 2);
        $this->assertContainsOnlyInstancesOf(Event::class, $events);
    }

    /**
     * @throws Exception
     */
    public function testSeasonEndpoint(): void
    {
        $event = $this->endpoint->season(1)[0];
        $this->assertSame('eventsseason.php', $event->strEvent);
    }

    /**
     * @throws Exception
     */
    public function testSeasonFilterLeague(): void
    {
        $this->endpoint->season(1);

        $this->assertEquals(
            (new ScheduleFilter())->setID(1),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testSeasonFilterSeason(): void
    {
        $this->endpoint->season(1, 'testSeason');

        $this->assertEquals(
            (new ScheduleFilter())->setID(1)->setSeason('testSeason'),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testSeasonInstances(): void
    {
        $events = $this->endpoint->season(1);
        $this->assertContainsOnlyInstancesOf(Event::class, $events);
    }

    /**
     * @throws Exception
     */
    public function testTeamNextEndpoint(): void
    {
        $event = $this->endpoint->teamNext(1)[0];
        $this->assertSame('eventsnext.php', $event->strEvent);
    }

    /**
     * @throws Exception
     */
    public function testTeamNextFilterLeague(): void
    {
        $this->endpoint->teamNext(1);

        $this->assertEquals(
            (new ScheduleFilter())->setID(1),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testTeamNextInstances(): void
    {
        $events = $this->endpoint->teamNext(1);
        $this->assertContainsOnlyInstancesOf(Event::class, $events);
    }

    /**
     * @throws Exception
     */
    public function testTeamLastEndpoint(): void
    {
        $event = $this->endpoint->teamLast(1)[0];
        $this->assertSame('eventslast.php', $event->strEvent);
    }

    /**
     * @throws Exception
     */
    public function testTeamLastFilterLeague(): void
    {
        $this->endpoint->teamLast(1);

        $this->assertEquals(
            (new ScheduleFilter())->setID(1),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testTeamLastInstances(): void
    {
        $events = $this->endpoint->teamLast(1);
        $this->assertContainsOnlyInstancesOf(Event::class, $events);
    }
}
