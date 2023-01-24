<?php

use NklKst\TheSportsDb\Client\Client;
use NklKst\TheSportsDb\Client\ClientFactory;
use NklKst\TheSportsDb\Entity\Country;
use NklKst\TheSportsDb\Entity\League;
use NklKst\TheSportsDb\Entity\Love;
use NklKst\TheSportsDb\Entity\Player\Player;
use NklKst\TheSportsDb\Entity\Season;
use NklKst\TheSportsDb\Entity\Sport;
use NklKst\TheSportsDb\Entity\Team;
use NklKst\TheSportsDb\Util\TestUtils;
use PHPUnit\Framework\TestCase;

/**
 * Lists at https://www.thesportsdb.com/api.php.
 *
 * @coversNothing
 */
class ListTest extends TestCase
{
    private Client $client;

    public function setUp(): void
    {
        $this->client = ClientFactory::create();
    }

    /**
     * List all sports (https://www.thesportsdb.com/api/v1/json/{PATREON_KEY}/all_sports.php).
     *
     * @throws Exception
     */
    public function testSports(): void
    {
        TestUtils::setPatreonKey($this->client);
        $sports = $this->client->list()->sports();

        $this->assertContainsOnlyInstancesOf(Sport::class, $sports);

        TestUtils::assertThatAllPropertiesAreInitialized($sports);
    }

    /**
     * List all countries (https://www.thesportsdb.com/api/v1/json/3/all_countries.php).
     *
     * @throws Exception
     */
    public function testCountries(): void
    {
        $countries = $this->client->list()->countries();
        $this->assertContainsOnlyInstancesOf(Country::class, $countries);

        TestUtils::assertThatAllPropertiesAreInitialized($countries);
    }

    /**
     * List all leagues (https://www.thesportsdb.com/api/v1/json/3/all_leagues.php).
     *
     * @throws Exception
     */
    public function testLeagues(): void
    {
        $leagues = $this->client->list()->leagues();
        $this->assertContainsOnlyInstancesOf(League::class, $leagues);

        TestUtils::assertThatAllPropertiesAreInitialized($leagues);
    }

    /**
     * List all leagues in a country (https://www.thesportsdb.com/api/v1/json/3/search_all_leagues.php?c=England).
     *
     * @throws Exception
     */
    public function testLeaguesInCountry(): void
    {
        $league = $this->client->list()->leagues('England')[0];
        $this->assertSame('England', $league->strCountry);

        TestUtils::assertThatAllPropertiesAreInitialized($league);
    }

    /**
     * List all leagues in a country by sport
     * (https://www.thesportsdb.com/api/v1/json/3/search_all_leagues.php?c=England&s=Soccer).
     *
     * @throws Exception
     */
    public function testLeaguesInCountryBySport(): void
    {
        $league = $this->client->list()->leagues('England', 'Soccer')[0];
        $this->assertSame('England', $league->strCountry);
        $this->assertSame('Soccer', $league->strSport);

        TestUtils::assertThatAllPropertiesAreInitialized($league);
    }

    /**
     * List all seasons in a league (https://www.thesportsdb.com/api/v1/json/3/search_all_seasons.php?id=4328).
     *
     * @throws Exception
     */
    public function testSeasonsInLeague(): void
    {
        $seasons = $this->client->list()->seasons(4328);
        $this->assertContainsOnlyInstancesOf(Season::class, $seasons);

        TestUtils::assertThatAllPropertiesAreInitialized($seasons);
    }

    /**
     * List all teams in a league
     * (https://www.thesportsdb.com/api/v1/json/3/search_all_teams.php?l=English%20Premier%20League).
     *
     * @throws Exception
     */
    public function testTeamsInLeague(): void
    {
        $teams = $this->client->list()->teamsSearch('English Premier League');
        $this->assertContainsOnlyInstancesOf(Team::class, $teams);
        $this->assertSame('English Premier League', $teams[0]->strLeague);

        TestUtils::assertThatAllPropertiesAreInitialized($teams);
    }

    /**
     * List all teams in a country by sport
     * (https://www.thesportsdb.com/api/v1/json/3/search_all_teams.php?s=Soccer&c=Spain).
     *
     * @throws Exception
     */
    public function testTeamsInCountryBySport(): void
    {
        $teams = $this->client->list()->teamsSearch(null, 'Soccer', 'Spain');
        $this->assertContainsOnlyInstancesOf(Team::class, $teams);
        $this->assertSame('Soccer', $teams[0]->strSport);
        $this->assertSame('Spain', $teams[0]->strCountry);

        TestUtils::assertThatAllPropertiesAreInitialized($teams);
    }

    /**
     * List all teams in a league by id (https://www.thesportsdb.com/api/v1/json/{PATREON_KEY}/lookup_all_teams.php?id=4328).
     *
     * @throws Exception
     */
    public function testTeamsInLeagueByID(): void
    {
        TestUtils::setPatreonKey($this->client);
        $teams = $this->client->list()->teams(4328);

        $this->assertContainsOnlyInstancesOf(Team::class, $teams);
        $this->assertSame(4328, $teams[0]->idLeague);

        TestUtils::assertThatAllPropertiesAreInitialized($teams);
    }

    /**
     * List All players in a team by Team Id
     * (https://www.thesportsdb.com/api/v1/json/{PATREON_KEY}/lookup_all_players.php?id=133604).
     *
     * @throws Exception
     */
    public function testPlayers(): void
    {
        TestUtils::setPatreonKey($this->client);
        $players = $this->client->list()->players(133604);

        $this->assertContainsOnlyInstancesOf(Player::class, $players);
        foreach ($players as $player) {
            $this->assertSame(133604, $player->idTeam);
        }

        TestUtils::assertThatAllPropertiesAreInitialized($players);
    }

    /**
     * @throws Exception
     */
    public function testPlayersNoMatch(): void
    {
        TestUtils::setPatreonKey($this->client);
        $players = $this->client->list()->players(1);

        $this->assertIsArray($players);
        $this->assertEmpty($players);

        TestUtils::assertThatAllPropertiesAreInitialized($players);
    }

    /**
     * List all users loved teams and players (https://www.thesportsdb.com/api/v1/json/3/searchloves.php?u=zag).
     *
     * @throws Exception
     */
    public function testLoves(): void
    {
        $loves = $this->client->list()->loves('zag');
        $this->assertContainsOnlyInstancesOf(Love::class, $loves);
        // $this->assertSame('zag', $loves[0]->strPlayer);

        TestUtils::assertThatAllPropertiesAreInitialized($loves);
    }
}
