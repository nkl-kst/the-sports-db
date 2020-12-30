<?php

use NklKst\TheSportsDb\Client\Client;
use NklKst\TheSportsDb\Client\ClientFactory;
use NklKst\TheSportsDb\Entity\Event\Event;
use NklKst\TheSportsDb\Entity\Event\Result;
use NklKst\TheSportsDb\Entity\League;
use NklKst\TheSportsDb\Entity\Player\Contract;
use NklKst\TheSportsDb\Entity\Player\FormerTeam;
use NklKst\TheSportsDb\Entity\Player\Honor;
use NklKst\TheSportsDb\Entity\Player\Player;
use NklKst\TheSportsDb\Entity\Table\Entry;
use NklKst\TheSportsDb\Entity\Table\Table;
use NklKst\TheSportsDb\Entity\Team;
use PHPUnit\Framework\TestCase;

/**
 * Lookups at https://www.thesportsdb.com/api.php.
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
     * Event statistics by id (https://www.thesportsdb.com/api/v1/json/1/lookupeventstats.php?id=1032723).
     *
     * TODO: This is a "patreon only" feature now.
     *
     * @throws Exception
     */
//    public function testStatistics(): void
//    {
//        $statistics = $this->client->lookup()->statistics(1032723);
//        $this->assertContainsOnlyInstancesOf(Statistic::class, $statistics);
//        $this->assertSame('Aston Villa vs Liverpool', $statistics[0]->strEvent);
//    }

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
        $this->assertSame('Man City', $entries[0]->name);
    }
}
