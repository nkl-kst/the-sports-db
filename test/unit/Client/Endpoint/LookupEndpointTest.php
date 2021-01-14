<?php

namespace NklKst\TheSportsDb\Client\Endpoint;

use Exception;
use NklKst\TheSportsDb\Config\Config;
use NklKst\TheSportsDb\Entity\Event\Event;
use NklKst\TheSportsDb\Entity\Event\Lineup;
use NklKst\TheSportsDb\Entity\Event\Result;
use NklKst\TheSportsDb\Entity\Event\Statistic;
use NklKst\TheSportsDb\Entity\Event\Timeline;
use NklKst\TheSportsDb\Entity\League;
use NklKst\TheSportsDb\Entity\Player\Contract;
use NklKst\TheSportsDb\Entity\Player\FormerTeam;
use NklKst\TheSportsDb\Entity\Player\Honor;
use NklKst\TheSportsDb\Entity\Player\Player;
use NklKst\TheSportsDb\Entity\Table\Table;
use NklKst\TheSportsDb\Entity\Team;
use NklKst\TheSportsDb\Filter\LookupFilter;
use NklKst\TheSportsDb\Util\TestUtils;
use PHPUnit\Framework\TestCase;

class LookupEndpointTest extends TestCase
{
    private LookupEndpoint $endpoint;

    protected function setUp(): void
    {
        $this->endpoint = new LookupEndpoint(new RequestBuilderMock(), new SerializerMock());
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
        $contract = $this->endpoint->contracts(1)[0];
        $this->assertSame('lookupcontracts.php', $contract->strSport);
    }

    /**
     * @throws Exception
     */
    public function testContractsInstances(): void
    {
        $contracts = $this->endpoint->contracts(1);
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
        $event = $this->endpoint->event(1);
        $this->assertSame('lookupevent.php', $event->strEvent);
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
        $formerTeam = $this->endpoint->formerTeams(1)[0];
        $this->assertSame('lookupformerteams.php', $formerTeam->strFormerTeam);
    }

    /**
     * @throws Exception
     */
    public function testFormerTeamInstances(): void
    {
        $formerTeams = $this->endpoint->formerTeams(1);
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
        $honor = $this->endpoint->honors(1)[0];
        $this->assertSame('lookuphonors.php', $honor->strHonour);
    }

    /**
     * @throws Exception
     */
    public function testHonorsInstances(): void
    {
        $honors = $this->endpoint->honors(1);
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
        $league = $this->endpoint->league(1);
        $this->assertSame('lookupleague.php', $league->strLeague);
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
        $lineup = $this->endpoint->lineup(1)[0];
        $this->assertSame('lookuplineup.php', $lineup->strPosition);
    }

    /**
     * @throws Exception
     */
    public function testLineupInstance(): void
    {
        $lineup = $this->endpoint->lineup(1);
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
        $player = $this->endpoint->player(1);
        $this->assertSame('lookupplayer.php', $player->strPlayer);
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
        $result = $this->endpoint->results(1)[0];
        $this->assertSame('eventresults.php', $result->strResult);
    }

    /**
     * @throws Exception
     */
    public function testResultInstances(): void
    {
        $results = $this->endpoint->results(1);
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
        $statistic = $this->endpoint->statistics(1)[0];
        $this->assertSame('lookupeventstats.php', $statistic->strStat);
    }

    /**
     * @throws Exception
     */
    public function testStatisticsInstances(): void
    {
        $statistics = $this->endpoint->statistics(1);
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
        $table = $this->endpoint->table(1);
        $this->assertSame('lookuptable.php', $table->entries[0]->name);
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
        $team = $this->endpoint->team(1);
        $this->assertSame('lookupteam.php', $team->strTeam);
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
        $event = $this->endpoint->timeline(1)[0];
        $this->assertSame('lookuptimeline.php', $event->strTimeline);
    }

    /**
     * @throws Exception
     */
    public function testTimelineInstance(): void
    {
        $timeline = $this->endpoint->timeline(1);
        $this->assertContainsOnlyInstancesOf(Timeline::class, $timeline);
    }
}
