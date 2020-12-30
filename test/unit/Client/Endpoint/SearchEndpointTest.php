<?php

namespace NklKst\TheSportsDb\Client\Endpoint;

use Exception;
use NklKst\TheSportsDb\Config\Config;
use NklKst\TheSportsDb\Entity\Event\Event;
use NklKst\TheSportsDb\Entity\Player\Player;
use NklKst\TheSportsDb\Entity\Team;
use NklKst\TheSportsDb\Filter\SearchFilter;
use NklKst\TheSportsDb\Util\TestUtils;
use PHPUnit\Framework\TestCase;

class SearchEndpointTest extends TestCase
{
    private SearchEndpoint $endpoint;

    protected function setUp(): void
    {
        $this->endpoint = new SearchEndpoint(new RequestBuilderMock(), new SerializerMock());
        $this->endpoint->setConfig(new Config());
    }

    /**
     * @throws Exception
     */
    public function testEventsEndpoint(): void
    {
        $event = $this->endpoint->events('testEvents')[0];
        $this->assertSame('searchevents.php', $event->strEvent);
    }

    /**
     * @throws Exception
     */
    public function testEventsFilterEvent(): void
    {
        $this->endpoint->events('testEvent');

        $this->assertEquals(
            (new SearchFilter())->setEventQuery('testEvent'),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testEventsFilterSeason(): void
    {
        $this->endpoint->events('testEvent', 'testSeason');

        $this->assertEquals(
            (new SearchFilter())->setEventQuery('testEvent')->setSeason('testSeason'),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testEventsInstances(): void
    {
        $events = $this->endpoint->events('testEvent');
        $this->assertContainsOnlyInstancesOf(Event::class, $events);
    }

    /**
     * @throws Exception
     */
    public function testEventFileEndpoint(): void
    {
        $event = $this->endpoint->eventFile('testFile');
        $this->assertSame('searchfilename.php', $event->strEvent);
    }

    /**
     * @throws Exception
     */
    public function testEventFileFilterFile(): void
    {
        $this->endpoint->eventFile('testFile');

        $this->assertEquals(
            (new SearchFilter())->setEventQuery('testFile'),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testPlayersEndpoint(): void
    {
        $player = $this->endpoint->players('testPlayer')[0];
        $this->assertSame('searchplayers.php', $player->strPlayer);
    }

    /**
     * @throws Exception
     */
    public function testPlayersFilterPlayer(): void
    {
        $this->endpoint->players('testPlayer');

        $this->assertEquals(
            (new SearchFilter())->setPlayerQuery('testPlayer'),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testPlayerFilterTeam(): void
    {
        $this->endpoint->players('testPlayer', 'testTeam');

        $this->assertEquals(
            (new SearchFilter())->setPlayerQuery('testPlayer')->setTeamQuery('testTeam'),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testPlayersInstances(): void
    {
        $players = $this->endpoint->players('testPlayer');
        $this->assertContainsOnlyInstancesOf(Player::class, $players);
    }

    /**
     * @throws Exception
     */
    public function testTeamsEndpoint(): void
    {
        $team = $this->endpoint->teams('testTeam')[0];
        $this->assertSame('searchteams.php', $team->strTeam);
    }

    /**
     * @throws Exception
     */
    public function testTeamFilterTeam(): void
    {
        $this->endpoint->teams('testTeam');

        $this->assertEquals(
            (new SearchFilter())->setTeamQuery('testTeam'),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testTeamFilterTeamShort(): void
    {
        $this->endpoint->teams('testTeamShort', true);

        $this->assertEquals(
            (new SearchFilter())->setTeamShortQuery('testTeamShort'),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testTeamInstances(): void
    {
        $teams = $this->endpoint->teams('testTeam');
        $this->assertContainsOnlyInstancesOf(Team::class, $teams);
    }
}
