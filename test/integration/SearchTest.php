<?php

use NklKst\TheSportsDb\Client\Client;
use NklKst\TheSportsDb\Client\ClientFactory;
use NklKst\TheSportsDb\Entity\Event\Event;
use NklKst\TheSportsDb\Entity\Player\Player;
use NklKst\TheSportsDb\Entity\Team;
use NklKst\TheSportsDb\Util\TestUtils;
use PHPUnit\Framework\TestCase;

/**
 * Search at https://www.thesportsdb.com/api.php.
 *
 * @coversNothing
 */
class SearchTest extends TestCase
{
    private Client $client;

    public function setUp(): void
    {
        $this->client = ClientFactory::create();
    }

    /**
     * Search for team by name (https://www.thesportsdb.com/api/v1/json/1/searchteams.php?t=Arsenal).
     *
     * @throws Exception
     */
    public function testTeams(): void
    {
        $teams = $this->client->search()->teams('Arsenal');
        $this->assertContainsOnlyInstancesOf(Team::class, $teams);
        $this->assertSame('Arsenal', $teams[0]->strTeam);
    }

    /**
     * Search for team short code (https://www.thesportsdb.com/api/v1/json/1/searchteams.php?sname=ARS).
     *
     * @throws Exception
     */
    public function testTeamsShort(): void
    {
        $teams = $this->client->search()->teams('ARS', true);
        $this->assertContainsOnlyInstancesOf(Team::class, $teams);
        $this->assertSame('ARS', $teams[0]->strTeamShort);
    }

    /**
     * Search for all players from team
     * (https://www.thesportsdb.com/api/v1/json/{PATREON_KEY}/searchplayers.php?t=Arsenal).
     *
     * @throws Exception
     */
    public function testPlayersOnlyTeam(): void
    {
        TestUtils::setPatreonKey($this->client);

        $players = $this->client->search()->players(null, 'Arsenal');
        $this->assertContainsOnlyInstancesOf(Player::class, $players);

        $this->assertGreaterThan(1, sizeof($players));
        foreach ($players as $player) {
            $this->assertSame('Arsenal', $player->strTeam);
        }
    }

    /**
     * Search for players by name (https://www.thesportsdb.com/api/v1/json/1/searchplayers.php?p=Danny%20Welbeck).
     *
     * @throws Exception
     */
    public function testPlayers(): void
    {
        $players = $this->client->search()->players('Danny Welbeck');
        $this->assertContainsOnlyInstancesOf(Player::class, $players);
        $this->assertSame('Danny Welbeck', $players[0]->strPlayer);
    }

    /**
     * Search for players by name and team
     * (https://www.thesportsdb.com/api/v1/json/1/searchplayers.php?t=Bayern&p=Müller).
     *
     * @throws Exception
     */
    public function testPlayersTeam(): void
    {
        $players = $this->client->search()->players('Müller', 'Bayern');
        $this->assertContainsOnlyInstancesOf(Player::class, $players);

        $player = $players[0];
        $this->assertSame('Thomas Muller', $player->strPlayer);
        $this->assertSame('Bayern Munich', $player->strTeam);
    }

    /**
     * Search for event by event name (https://www.thesportsdb.com/api/v1/json/1/searchevents.php?e=Arsenal_vs_Chelsea).
     *
     * @throws Exception
     */
    public function testEvents(): void
    {
        $events = $this->client->search()->events('Arsenal_vs_Chelsea');
        $this->assertContainsOnlyInstancesOf(Event::class, $events);
        $this->assertSame('Arsenal vs Chelsea', $events[0]->strEvent);
    }

    /**
     * Search for event by event name and season
     * (https://www.thesportsdb.com/api/v1/json/1/searchevents.php?e=Arsenal_vs_Chelsea&s=2016-2017).
     *
     * @throws Exception
     */
    public function testEventsSeason(): void
    {
        $events = $this->client->search()->events('Arsenal_vs_Chelsea', '2016-2017');
        $this->assertContainsOnlyInstancesOf(Event::class, $events);

        $event = $events[0];
        $this->assertSame('Arsenal vs Chelsea', $event->strEvent);
        $this->assertSame('2016-2017', $event->strSeason);
    }

    /**
     * Search for event by event file name
     * (https://www.thesportsdb.com/api/v1/json/1/searchfilename.php?e=English_Premier_League_2015-04-26_Arsenal_vs_Chelsea).
     *
     * @throws Exception
     */
    public function testEventFile(): void
    {
        $event = $this->client->search()->eventFile('English_Premier_League_2015-04-26_Arsenal_vs_Chelsea');
        $this->assertInstanceOf(Event::class, $event);
        $this->assertSame('English Premier League 2015-04-26 Arsenal vs Chelsea', $event->strFilename);
    }
}
