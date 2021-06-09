<?php

use NklKst\TheSportsDb\Client\Client;
use NklKst\TheSportsDb\Client\ClientFactory;
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
use NklKst\TheSportsDb\Entity\Table\Entry;
use NklKst\TheSportsDb\Entity\Table\Standing;
use NklKst\TheSportsDb\Entity\Table\Table;
use NklKst\TheSportsDb\Entity\Team;
use NklKst\TheSportsDb\Util\TestUtils;
use PHPUnit\Framework\TestCase;

/**
 * Lookups at https://www.thesportsdb.com/api.php.
 *
 * @coversNothing
 */
class LookupTest extends TestCase
{
    private Client $client;

    public function setUp(): void
    {
        $this->client = ClientFactory::create();
    }

    /**
     * League details by id (https://www.thesportsdb.com/api/v1/json/1/lookupleague.php?id=4346).
     *
     * @throws Exception
     */
    public function testLeague(): void
    {
        $league = $this->client->lookup()->league(4346);
        $this->assertInstanceOf(League::class, $league);
        $this->assertSame('American Major League Soccer', $league->strLeague);
    }

    /**
     * Team details by id (https://www.thesportsdb.com/api/v1/json/1/lookupteam.php?id=133604).
     *
     * @throws Exception
     */
    public function testTeam(): void
    {
        $team = $this->client->lookup()->team(133604);
        $this->assertInstanceOf(Team::class, $team);
        $this->assertSame('Arsenal', $team->strTeam);
    }

    /**
     * Player details by id (https://www.thesportsdb.com/api/v1/json/1/lookupplayer.php?id=34145937).
     *
     * @throws Exception
     */
    public function testPlayer(): void
    {
        $player = $this->client->lookup()->player(34145937);
        $this->assertInstanceOf(Player::class, $player);
        $this->assertSame('Mario Balotelli', $player->strPlayer);
    }

    /**
     * Event details by id (https://www.thesportsdb.com/api/v1/json/1/lookupevent.php?id=441613).
     *
     * @throws Exception
     */
    public function testEvent(): void
    {
        $event = $this->client->lookup()->event(441613);
        $this->assertInstanceOf(Event::class, $event);
        $this->assertSame('Liverpool vs Swansea', $event->strEvent);
    }

    /**
     * Event statistics by id (https://www.thesportsdb.com/api/v1/json/{PATREON_KEY}/lookupeventstats.php?id=1032723).
     *
     * @throws Exception
     */
    public function testStatistics(): void
    {
        TestUtils::setPatreonKey($this->client);
        $statistics = $this->client->lookup()->statistics(1032723);

        $this->assertContainsOnlyInstancesOf(Statistic::class, $statistics);
        $this->assertSame('Aston Villa vs Liverpool', $statistics[0]->strEvent);
    }

    /**
     * Event Lineup by Id (https://www.thesportsdb.com/api/v1/json/{PATREON_KEY}/lookuplineup.php?id=1032723).
     *
     * @throws Exception
     */
    public function testLineup(): void
    {
        TestUtils::setPatreonKey($this->client);
        $lineup = $this->client->lookup()->lineup(1032723);

        $this->assertContainsOnlyInstancesOf(Lineup::class, $lineup);
        foreach ($lineup as $player) {
            $this->assertSame('Aston Villa vs Liverpool', $player->strEvent);
        }
    }

    /**
     * List timeline for events by event ID
     * (https://www.thesportsdb.com/api/v1/json/{PATREON_KEY}/lookuptimeline.php?id=1032718).
     *
     * @throws Exception
     */
    public function testTimeline(): void
    {
        TestUtils::setPatreonKey($this->client);
        $timeline = $this->client->lookup()->timeline(1032718);

        $this->assertContainsOnlyInstancesOf(Timeline::class, $timeline);
        foreach ($timeline as $event) {
            $this->assertSame('Sheffield United vs Leeds', $event->strEvent);
        }
    }

    /**
     * Player honors by player id (https://www.thesportsdb.com/api/v1/json/1/lookuphonors.php?id=34147178).
     *
     * @throws Exception
     */
    public function testHonors(): void
    {
        $honors = $this->client->lookup()->honors(34147178);
        $this->assertContainsOnlyInstancesOf(Honor::class, $honors);
        $this->assertSame('Edenilson', $honors[0]->strPlayer);
    }

    /**
     * Player former teams by player id (https://www.thesportsdb.com/api/v1/json/1/lookupformerteams.php?id=34147178).
     *
     * @throws Exception
     */
    public function testFormerTeams(): void
    {
        $teams = $this->client->lookup()->formerTeams(34147178);
        $this->assertContainsOnlyInstancesOf(FormerTeam::class, $teams);
        $this->assertSame('Edenilson', $teams[0]->strPlayer);
    }

    /**
     * Player Contracts by Player Id (https://www.thesportsdb.com/api/v1/json/1/lookupcontracts.php?id=34147178).
     *
     * @throws Exception
     */
    public function testContracts(): void
    {
        $contracts = $this->client->lookup()->contracts(34147178);
        $this->assertContainsOnlyInstancesOf(Contract::class, $contracts);
        $this->assertSame('Edenilson', $contracts[0]->strPlayer);
    }

    /**
     * Event results by event id (https://www.thesportsdb.com/api/v1/json/1/eventresults.php?id=652890).
     *
     * @throws Exception
     */
    public function testResults(): void
    {
        $results = $this->client->lookup()->results(652890);
        $this->assertContainsOnlyInstancesOf(Result::class, $results);
        $this->assertSame('Anaheim 1', $results[0]->strEvent);
    }

    /**
     * Event TV by Event Id (https://www.thesportsdb.com/api/v1/json/{PATREON_KEY}/lookuptv.php?id=584911).
     *
     * @throws Exception
     */
    public function testTelevision(): void
    {
        TestUtils::setPatreonKey($this->client);
        $television = $this->client->lookup()->television(584911);

        $this->assertContainsOnlyInstancesOf(Television::class, $television);
        foreach ($television as $event) {
            $this->assertSame('Marrakesh E-Prix', $event->strEvent);
        }
    }

    /**
     * Lookup table by league id and season
     * (https://www.thesportsdb.com/api/v1/json/1/lookuptable.php?l=4328&s=2018-2019).
     *
     * @throws Exception
     */
    public function testTable(): void
    {
        $table = $this->client->lookup()->table(4328, '2018-2019');
        $this->assertInstanceOf(Table::class, $table);

        $entries = $table->entries;
        $this->assertContainsOnlyInstancesOf(Entry::class, $entries);
        $this->assertSame('Man City', $entries[0]->strTeam);
    }

    /**
     * Lookup table by league id and season (with standing entity)
     * (https://www.thesportsdb.com/api/v1/json/1/lookuptable.php?l=4328&s=2018-2019).
     *
     * @throws Exception
     */
    public function testTableStandings(): void
    {
        $table = $this->client->lookup()->table(4328, '2018-2019');
        $this->assertInstanceOf(Table::class, $table);

        $entries = $table->standings;
        $this->assertContainsOnlyInstancesOf(Standing::class, $entries);
        $this->assertSame('Man City', $entries[0]->strTeam);
    }
}
