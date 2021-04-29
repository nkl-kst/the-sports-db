<?php

namespace NklKst\TheSportsDb\Client\Endpoint;

use Exception;
use NklKst\TheSportsDb\Config\Config;
use NklKst\TheSportsDb\Entity\Event\Event;
use NklKst\TheSportsDb\Entity\Event\Lineup;
use NklKst\TheSportsDb\Entity\Event\Result;
use NklKst\TheSportsDb\Entity\Event\Statistic;
use NklKst\TheSportsDb\Entity\Event\Television;
use NklKst\TheSportsDb\Entity\Event\Timeline;
use NklKst\TheSportsDb\Entity\League;
use NklKst\TheSportsDb\Entity\Player\Contract;
use NklKst\TheSportsDb\Entity\Player\FormerTeam;
use NklKst\TheSportsDb\Entity\Player\Honor;
use NklKst\TheSportsDb\Entity\Player\Player;
use NklKst\TheSportsDb\Entity\Table\Table;
use NklKst\TheSportsDb\Entity\Team;
use NklKst\TheSportsDb\Filter\LookupFilter;
use NklKst\TheSportsDb\Request\RequestBuilder;
use NklKst\TheSportsDb\Util\TestUtils;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NklKst\TheSportsDb\Client\Endpoint\LookupEndpoint
 */
class LookupEndpointTest extends TestCase
{
    private LookupEndpoint $endpoint;

    private MockObject $requestBuilderMock;

    protected function setUp(): void
    {
        $this->endpoint = new LookupEndpoint(
            $this->requestBuilderMock = $this->createMock(RequestBuilder::class),
            new SerializerMock());
        $this->endpoint->setConfig(new Config());
    }

    /**
     * @throws Exception
     */
    public function testContractsFilterPlayer(): void
    {
        $this->endpoint->contracts(1);

        $this->assertEquals(
            (new LookupFilter())->setID(1),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testContractsEndpoint(): void
    {
        TestUtils::expectEndpoint($this->requestBuilderMock, 'lookupcontracts.php');
        $this->endpoint->contracts(1);
    }

    /**
     * @throws Exception
     */
    public function testContractsInstances(): void
    {
        $contracts = $this->endpoint->contracts(1);

        $this->assertNotEmpty($contracts);
        $this->assertContainsOnlyInstancesOf(Contract::class, $contracts);
    }

    /**
     * @throws Exception
     */
    public function testEventFilterEvent(): void
    {
        $this->endpoint->event(1);

        $this->assertEquals(
            (new LookupFilter())->setID(1),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testEventEndpoint(): void
    {
        TestUtils::expectEndpoint($this->requestBuilderMock, 'lookupevent.php');
        $this->endpoint->event(1);
    }

    /**
     * @throws Exception
     */
    public function testEventInstance(): void
    {
        $event = $this->endpoint->event(1);
        $this->assertInstanceOf(Event::class, $event);
    }

    /**
     * @throws Exception
     */
    public function testFormerTeamsFilterPlayer(): void
    {
        $this->endpoint->formerTeams(1);

        $this->assertEquals(
            (new LookupFilter())->setID(1),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testFormerTeamsEndpoint(): void
    {
        TestUtils::expectEndpoint($this->requestBuilderMock, 'lookupformerteams.php');
        $this->endpoint->formerTeams(1);
    }

    /**
     * @throws Exception
     */
    public function testFormerTeamInstances(): void
    {
        $formerTeams = $this->endpoint->formerTeams(1);

        $this->assertNotEmpty($formerTeams);
        $this->assertContainsOnlyInstancesOf(FormerTeam::class, $formerTeams);
    }

    /**
     * @throws Exception
     */
    public function testHonorsFilterPlayer(): void
    {
        $this->endpoint->honors(1);

        $this->assertEquals(
            (new LookupFilter())->setID(1),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testHonorsEndpoint(): void
    {
        TestUtils::expectEndpoint($this->requestBuilderMock, 'lookuphonors.php');
        $this->endpoint->honors(1);
    }

    /**
     * @throws Exception
     */
    public function testHonorsInstances(): void
    {
        $honors = $this->endpoint->honors(1);

        $this->assertNotEmpty($honors);
        $this->assertContainsOnlyInstancesOf(Honor::class, $honors);
    }

    /**
     * @throws Exception
     */
    public function testLeagueFilterLeague(): void
    {
        $this->endpoint->league(1);

        $this->assertEquals(
            (new LookupFilter())->setID(1),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testLeagueEndpoint(): void
    {
        TestUtils::expectEndpoint($this->requestBuilderMock, 'lookupleague.php');
        $this->endpoint->league(1);
    }

    /**
     * @throws Exception
     */
    public function testLeagueInstance(): void
    {
        $league = $this->endpoint->league(1);
        $this->assertInstanceOf(League::class, $league);
    }

    /**
     * @throws Exception
     */
    public function testLineupFilterLeague(): void
    {
        $this->endpoint->lineup(1);

        $this->assertEquals(
            (new LookupFilter())->setID(1),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testLineupEndpoint(): void
    {
        TestUtils::expectEndpoint($this->requestBuilderMock, 'lookuplineup.php');
        $this->endpoint->lineup(1);
    }

    /**
     * @throws Exception
     */
    public function testLineupInstances(): void
    {
        $lineup = $this->endpoint->lineup(1);

        $this->assertNotEmpty($lineup);
        $this->assertContainsOnlyInstancesOf(Lineup::class, $lineup);
    }

    /**
     * @throws Exception
     */
    public function testPlayerFilterPlayer(): void
    {
        $this->endpoint->league(1);

        $this->assertEquals(
            (new LookupFilter())->setID(1),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testPlayerEndpoint(): void
    {
        TestUtils::expectEndpoint($this->requestBuilderMock, 'lookupplayer.php');
        $this->endpoint->player(1);
    }

    /**
     * @throws Exception
     */
    public function testPlayerInstance(): void
    {
        $player = $this->endpoint->player(1);
        $this->assertInstanceOf(Player::class, $player);
    }

    /**
     * @throws Exception
     */
    public function testResultsFilterEvent(): void
    {
        $this->endpoint->results(1);

        $this->assertEquals(
            (new LookupFilter())->setID(1),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testResultsEndpoint(): void
    {
        TestUtils::expectEndpoint($this->requestBuilderMock, 'eventresults.php');
        $this->endpoint->results(1);
    }

    /**
     * @throws Exception
     */
    public function testResultInstances(): void
    {
        $results = $this->endpoint->results(1);

        $this->assertNotEmpty($results);
        $this->assertContainsOnlyInstancesOf(Result::class, $results);
    }

    /**
     * @throws Exception
     */
    public function testStatisticsFilterEvent(): void
    {
        $this->endpoint->statistics(1);

        $this->assertEquals(
            (new LookupFilter())->setID(1),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testStatisticsEndpoint(): void
    {
        TestUtils::expectEndpoint($this->requestBuilderMock, 'lookupeventstats.php');
        $this->endpoint->statistics(1);
    }

    /**
     * @throws Exception
     */
    public function testStatisticsInstances(): void
    {
        $statistics = $this->endpoint->statistics(1);

        $this->assertNotEmpty($statistics);
        $this->assertContainsOnlyInstancesOf(Statistic::class, $statistics);
    }

    /**
     * @throws Exception
     */
    public function testTableFilterLeague(): void
    {
        $this->endpoint->table(1);

        $this->assertEquals(
            (new LookupFilter())->setLeagueID(1),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testTableFilterSeason(): void
    {
        $this->endpoint->table(1, 'testSeason');

        $this->assertEquals(
            (new LookupFilter())->setLeagueID(1)->setSeason('testSeason'),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testTableEndpoint(): void
    {
        TestUtils::expectEndpoint($this->requestBuilderMock, 'lookuptable.php');
        $this->endpoint->table(1);
    }

    /**
     * @throws Exception
     */
    public function testTableInstance(): void
    {
        $table = $this->endpoint->table(1);
        $this->assertInstanceOf(Table::class, $table);
    }

    /**
     * @throws Exception
     */
    public function testTeamFilterTeam(): void
    {
        $this->endpoint->team(1);

        $this->assertEquals(
            (new LookupFilter())->setID(1),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testTeamEndpoint(): void
    {
        TestUtils::expectEndpoint($this->requestBuilderMock, 'lookupteam.php');
        $this->endpoint->team(1);
    }

    /**
     * @throws Exception
     */
    public function testTeamInstance(): void
    {
        $team = $this->endpoint->team(1);
        $this->assertInstanceOf(Team::class, $team);
    }

    /**
     * @throws Exception
     */
    public function testTelevisionFilterEvent(): void
    {
        $this->endpoint->television(1);

        $this->assertEquals(
            (new LookupFilter())->setID(1),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testTelevisionEndpoint(): void
    {
        TestUtils::expectEndpoint($this->requestBuilderMock, 'lookuptv.php');
        $this->endpoint->television(1);
    }

    /**
     * @throws Exception
     */
    public function testTelevisionInstances(): void
    {
        $television = $this->endpoint->television(1);

        $this->assertNotEmpty($television);
        $this->assertContainsOnlyInstancesOf(Television::class, $television);
    }

    /**
     * @throws Exception
     */
    public function testTimelineFilterEvent(): void
    {
        $this->endpoint->timeline(1);

        $this->assertEquals(
            (new LookupFilter())->setID(1),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testTimelineEndpoint(): void
    {
        TestUtils::expectEndpoint($this->requestBuilderMock, 'lookuptimeline.php');
        $this->endpoint->timeline(1);
    }

    /**
     * @throws Exception
     */
    public function testTimelineInstances(): void
    {
        $timeline = $this->endpoint->timeline(1);

        $this->assertNotEmpty($timeline);
        $this->assertContainsOnlyInstancesOf(Timeline::class, $timeline);
    }
}
