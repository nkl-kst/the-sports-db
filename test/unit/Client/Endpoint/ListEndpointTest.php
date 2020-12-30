<?php

namespace NklKst\TheSportsDb\Client\Endpoint;

use Exception;
use NklKst\TheSportsDb\Config\Config;
use NklKst\TheSportsDb\Entity\Country;
use NklKst\TheSportsDb\Entity\League;
use NklKst\TheSportsDb\Entity\Love;
use NklKst\TheSportsDb\Entity\Season;
use NklKst\TheSportsDb\Entity\Sport;
use NklKst\TheSportsDb\Entity\Team;
use NklKst\TheSportsDb\Filter\ListFilter;
use NklKst\TheSportsDb\Util\TestUtils;
use PHPUnit\Framework\TestCase;

class ListEndpointTest extends TestCase
{
    private ListEndpoint $endpoint;

    protected function setUp(): void
    {
        $this->endpoint = new ListEndpoint(new RequestBuilderMock(), new SerializerMock());
        $this->endpoint->setConfig(new Config());
    }

    /**
     * @throws Exception
     */
    public function testCountriesInstances(): void
    {
        $countries = $this->endpoint->countries();
        $this->assertContainsOnlyInstancesOf(Country::class, $countries);
    }

    /**
     * @throws Exception
     */
    public function testCountriesEndpoint(): void
    {
        $country = $this->endpoint->countries()[0];
        $this->assertSame('all_countries.php', $country->name_en);
    }

    /**
     * @throws Exception
     */
    public function testLeaguesInstances(): void
    {
        $leagues = $this->endpoint->leagues();
        $this->assertContainsOnlyInstancesOf(League::class, $leagues);
    }

    /**
     * @throws Exception
     */
    public function testLeaguesFilterCountry(): void
    {
        $this->endpoint->leagues('testCountry')[0];

        $this->assertEquals(
            (new ListFilter())->setCountryQuery('testCountry'),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testLeaguesFilterSport(): void
    {
        $this->endpoint->leagues(null, 'testSport')[0];

        $this->assertEquals(
            (new ListFilter())->setSportQuery('testSport'),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testLeaguesEndpoint(): void
    {
        $league = $this->endpoint->leagues()[0];
        $this->assertSame('all_leagues.php', $league->strLeague);
    }

    /**
     * @throws Exception
     */
    public function testLeaguesEndpointQuery(): void
    {
        $league = $this->endpoint->leagues('testCountry')[0];
        $this->assertSame('search_all_leagues.php', $league->strLeague);
    }

    /**
     * @throws Exception
     */
    public function testLovesInstances(): void
    {
        $loves = $this->endpoint->loves('dummy');
        $this->assertContainsOnlyInstancesOf(Love::class, $loves);
    }

    /**
     * @throws Exception
     */
    public function testLovesEndpoint(): void
    {
        $love = $this->endpoint->loves('dummy')[0];
        $this->assertSame('searchloves.php', $love->strUsername);
    }

    /**
     * @throws Exception
     */
    public function testLovesFilterUser(): void
    {
        $this->endpoint->loves('testUser')[0];

        $this->assertEquals(
            (new ListFilter())->setUser('testUser'),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testSeasonsInstances(): void
    {
        $seasons = $this->endpoint->seasons(1);
        $this->assertContainsOnlyInstancesOf(Season::class, $seasons);
    }

    /**
     * @throws Exception
     */
    public function testSeasonsEndpoint(): void
    {
        $season = $this->endpoint->seasons(1)[0];
        $this->assertSame('search_all_seasons.php', $season->strSeason);
    }

    /**
     * @throws Exception
     */
    public function testSeasonsFilterLeagueID(): void
    {
        $this->endpoint->seasons(1)[0];

        $this->assertEquals(
            (new ListFilter())->setID(1),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testSportsInstances(): void
    {
        $sports = $this->endpoint->sports();
        $this->assertContainsOnlyInstancesOf(Sport::class, $sports);
    }

    /**
     * @throws Exception
     */
    public function testSportsEndpoint(): void
    {
        $sport = $this->endpoint->sports()[0];
        $this->assertSame('all_sports.php', $sport->strSport);
    }

    /**
     * @throws Exception
     */
    public function testTeamsInstances(): void
    {
        $teams = $this->endpoint->teams(1);
        $this->assertContainsOnlyInstancesOf(Team::class, $teams);
    }

    /**
     * @throws Exception
     */
    public function testTeamsEndpoint(): void
    {
        $team = $this->endpoint->teams(1)[0];
        $this->assertSame('lookup_all_teams.php', $team->strTeam);
    }

    /**
     * @throws Exception
     */
    public function testTeamsFilterLeagueID(): void
    {
        $this->endpoint->teams(1)[0];

        $this->assertEquals(
            (new ListFilter())->setID(1),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testTeamsSearchInstances(): void
    {
        $teams = $this->endpoint->teamsSearch();
        $this->assertContainsOnlyInstancesOf(Team::class, $teams);
    }

    /**
     * @throws Exception
     */
    public function testTeamsSearchFilterLeague(): void
    {
        $this->endpoint->teamsSearch('testLeague')[0];

        $this->assertEquals(
            (new ListFilter())->setLeagueQuery('testLeague'),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testTeamsSearchFilterSport(): void
    {
        $this->endpoint->teamsSearch(null, 'testSport')[0];

        $this->assertEquals(
            (new ListFilter())->setSportQuery('testSport'),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testTeamsSearchFilterCountry(): void
    {
        $this->endpoint->teamsSearch(null, null, 'testCountry')[0];

        $this->assertEquals(
            (new ListFilter())->setCountryQuery('testCountry'),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testTeamsSearchEndpoint(): void
    {
        $team = $this->endpoint->teamsSearch()[0];
        $this->assertSame('search_all_teams.php', $team->strTeam);
    }
}
