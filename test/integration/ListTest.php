<?php

use NklKst\TheSportsDb\Client\Client;
use NklKst\TheSportsDb\Client\ClientFactory;
use NklKst\TheSportsDb\Entity\Country;
use NklKst\TheSportsDb\Entity\League;
use NklKst\TheSportsDb\Entity\Love;
use NklKst\TheSportsDb\Entity\Season;
use NklKst\TheSportsDb\Entity\Sport;
use NklKst\TheSportsDb\Entity\Team;
use PHPUnit\Framework\TestCase;

/**
 * Lists at https://www.thesportsdb.com/api.php.
 */
class ListTest extends TestCase
{
    private Client $client;

    public function setUp(): void
    {
        $this->client = ClientFactory::create();
    }

    /**
     * List all sports (https://www.thesportsdb.com/api/v1/json/1/all_sports.php).
     *
     * @throws Exception
     */
    public function testListSports(): void
    {
        $sports = $this->client->list()->sports();
        $this->assertContainsOnlyInstancesOf(Sport::class, $sports);
    }

    /**
     * List all countries (https://www.thesportsdb.com/api/v1/json/1/all_countries.php).
     *
     * @throws Exception
     */
    public function testListCountries(): void
    {
        $countries = $this->client->list()->countries();
        $this->assertContainsOnlyInstancesOf(Country::class, $countries);
    }

    /**
     * List all leagues (https://www.thesportsdb.com/api/v1/json/1/all_leagues.php).
     *
     * @throws Exception
     */
    public function testListLeagues(): void
    {
        $leagues = $this->client->list()->leagues();
        $this->assertContainsOnlyInstancesOf(League::class, $leagues);
    }

    /**
     * List all leagues in a country (https://www.thesportsdb.com/api/v1/json/1/search_all_leagues.php?c=England).
     *
     * @throws Exception
     */
    public function testListLeaguesInCountry(): void
    {
        $league = $this->client->list()->leagues('England')[0];
        $this->assertSame('England', $league->strCountry);
    }

    /**
     * List all leagues in a country by sport
     * (https://www.thesportsdb.com/api/v1/json/1/search_all_leagues.php?c=England&s=Soccer).
     *
     * @throws Exception
     */
    public function testListLeaguesInCountryBySport(): void
    {
        $league = $this->client->list()->leagues('England', 'Soccer')[0];
        $this->assertSame('England', $league->strCountry);
        $this->assertSame('Soccer', $league->strSport);
    }

    /**
     * List all seasons in a league (https://www.thesportsdb.com/api/v1/json/1/search_all_seasons.php?id=4328).
     *
     * @throws Exception
     */
    public function testListSeasonsInLeague(): void
    {
        $seasons = $this->client->list()->seasons(4328);
        $this->assertContainsOnlyInstancesOf(Season::class, $seasons);
    }

    /**
     * List all teams in a league
     * (https://www.thesportsdb.com/api/v1/json/1/search_all_teams.php?l=English%20Premier%20League).
     *
     * @throws Exception
     */
    public function testListTeamsInLeague(): void
    {
        $teams = $this->client->list()->teamsSearch('English Premier League');
        $this->assertContainsOnlyInstancesOf(Team::class, $teams);
        $this->assertSame('English Premier League', $teams[0]->strLeague);
    }

    /**
     * List all teams in a country by sport
     * (https://www.thesportsdb.com/api/v1/json/1/search_all_teams.php?s=Soccer&c=Spain).
     *
     * @throws Exception
     */
    public function testListTeamsInCountryBySport(): void
    {
        $teams = $this->client->list()->teamsSearch(null, 'Soccer', 'Spain');
        $this->assertContainsOnlyInstancesOf(Team::class, $teams);
        $this->assertSame('Soccer', $teams[0]->strSport);
        $this->assertSame('Spain', $teams[0]->strCountry);
    }

    /**
     * List all teams in a league by id (https://www.thesportsdb.com/api/v1/json/1/lookup_all_teams.php?id=4328).
     *
     * @throws Exception
     */
    public function testListTeamsInLeagueByID(): void
    {
        $teams = $this->client->list()->teams(4328);
        $this->assertContainsOnlyInstancesOf(Team::class, $teams);
        $this->assertSame(4328, $teams[0]->idLeague);
    }

    /**
     * List all users loved teams and players (https://www.thesportsdb.com/api/v1/json/1/searchloves.php?u=zag).
     *
     * @throws Exception
     */
    public function testListLoves(): void
    {
        $loves = $this->client->list()->loves('zag');
        $this->assertContainsOnlyInstancesOf(Love::class, $loves);
        //$this->assertSame('zag', $loves[0]->strPlayer);
    }
}