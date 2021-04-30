<?php

namespace NklKst\TheSportsDb\Client\Endpoint;

use Exception;
use NklKst\TheSportsDb\Config\Config;
use NklKst\TheSportsDb\Entity\Country;
use NklKst\TheSportsDb\Entity\League;
use NklKst\TheSportsDb\Entity\Love;
use NklKst\TheSportsDb\Entity\Player\Player;
use NklKst\TheSportsDb\Entity\Season;
use NklKst\TheSportsDb\Entity\Sport;
use NklKst\TheSportsDb\Entity\Team;
use NklKst\TheSportsDb\Filter\ListFilter;
use NklKst\TheSportsDb\Request\RequestBuilder;
use NklKst\TheSportsDb\Serializer\Serializer;
use NklKst\TheSportsDb\Util\TestUtils;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\MockObject\Stub;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NklKst\TheSportsDb\Client\Endpoint\ListEndpoint
 */
class ListEndpointTest extends TestCase
{
    private ListEndpoint $endpoint;

    private MockObject $requestBuilderMock;
    private Stub $serializerStub;

    protected function setUp(): void
    {
        $this->endpoint = new ListEndpoint(
            $this->requestBuilderMock = $this->createMock(RequestBuilder::class),
            $this->serializerStub = $this->createStub(Serializer::class));
        $this->endpoint->setConfig(new Config());
    }

    /**
     * @throws Exception
     */
    public function testCountriesInstances(): void
    {
        $this->serializerStub->method('serializeCountries')->willReturn([new Country()]);

        $countries = $this->endpoint->countries();

        $this->assertNotEmpty($countries);
        $this->assertContainsOnlyInstancesOf(Country::class, $countries);
    }

    /**
     * @throws Exception
     */
    public function testCountriesEndpoint(): void
    {
        TestUtils::expectEndpoint($this->requestBuilderMock, 'all_countries.php');
        $this->endpoint->countries();
    }

    /**
     * @throws Exception
     */
    public function testLeaguesInstances(): void
    {
        $this->serializerStub->method('serializeLeagues')->willReturn([new League()]);

        $leagues = $this->endpoint->leagues();

        $this->assertNotEmpty($leagues);
        $this->assertContainsOnlyInstancesOf(League::class, $leagues);
    }

    /**
     * @throws Exception
     */
    public function testLeaguesFilterCountry(): void
    {
        $this->endpoint->leagues('testCountry');

        $this->assertEquals(
            (new ListFilter())->setCountryQuery('testCountry'),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testLeaguesFilterSport(): void
    {
        $this->endpoint->leagues(null, 'testSport');

        $this->assertEquals(
            (new ListFilter())->setSportQuery('testSport'),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testLeaguesEndpoint(): void
    {
        TestUtils::expectEndpoint($this->requestBuilderMock, 'all_leagues.php');
        $this->endpoint->leagues();
    }

    /**
     * @throws Exception
     */
    public function testLeaguesEndpointQuery(): void
    {
        TestUtils::expectEndpoint($this->requestBuilderMock, 'search_all_leagues.php');
        $this->endpoint->leagues('testCountry');
    }

    /**
     * @throws Exception
     */
    public function testLovesInstances(): void
    {
        $this->serializerStub->method('serializeLoves')->willReturn([new Love()]);

        $loves = $this->endpoint->loves('dummy');

        $this->assertNotEmpty($loves);
        $this->assertContainsOnlyInstancesOf(Love::class, $loves);
    }

    /**
     * @throws Exception
     */
    public function testLovesEndpoint(): void
    {
        TestUtils::expectEndpoint($this->requestBuilderMock, 'searchloves.php');
        $this->endpoint->loves('dummy');
    }

    /**
     * @throws Exception
     */
    public function testLovesFilterUser(): void
    {
        $this->endpoint->loves('testUser');

        $this->assertEquals(
            (new ListFilter())->setUser('testUser'),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testPlayersInstances(): void
    {
        $this->serializerStub->method('serializePlayers')->willReturn([new Player()]);

        $players = $this->endpoint->players(1);

        $this->assertNotEmpty($players);
        $this->assertContainsOnlyInstancesOf(Player::class, $players);
    }

    /**
     * @throws Exception
     */
    public function testPlayersEndpoint(): void
    {
        TestUtils::expectEndpoint($this->requestBuilderMock, 'lookup_all_players.php');
        $this->endpoint->players(1);
    }

    /**
     * @throws Exception
     */
    public function testPlayersFilterTeam(): void
    {
        $this->endpoint->players(1);

        $this->assertEquals(
            (new ListFilter())->setID(1),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testSeasonsInstances(): void
    {
        $this->serializerStub->method('serializeSeasons')->willReturn([new Season()]);

        $seasons = $this->endpoint->seasons(1);

        $this->assertNotEmpty($seasons);
        $this->assertContainsOnlyInstancesOf(Season::class, $seasons);
    }

    /**
     * @throws Exception
     */
    public function testSeasonsEndpoint(): void
    {
        TestUtils::expectEndpoint($this->requestBuilderMock, 'search_all_seasons.php');
        $this->endpoint->seasons(1);
    }

    /**
     * @throws Exception
     */
    public function testSeasonsFilterLeagueID(): void
    {
        $this->endpoint->seasons(1);

        $this->assertEquals(
            (new ListFilter())->setID(1),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testSportsInstances(): void
    {
        $this->serializerStub->method('serializeSports')->willReturn([new Sport()]);

        $sports = $this->endpoint->sports();

        $this->assertNotEmpty($sports);
        $this->assertContainsOnlyInstancesOf(Sport::class, $sports);
    }

    /**
     * @throws Exception
     */
    public function testSportsEndpoint(): void
    {
        $this->serializerStub->method('serializeSports')->willReturn([new Sport()]);

        TestUtils::expectEndpoint($this->requestBuilderMock, 'all_sports.php');
        $this->endpoint->sports();
    }

    /**
     * @throws Exception
     */
    public function testTeamsInstances(): void
    {
        $this->serializerStub->method('serializeTeams')->willReturn([new Team()]);

        $teams = $this->endpoint->teams(1);

        $this->assertNotEmpty($teams);
        $this->assertContainsOnlyInstancesOf(Team::class, $teams);
    }

    /**
     * @throws Exception
     */
    public function testTeamsEndpoint(): void
    {
        TestUtils::expectEndpoint($this->requestBuilderMock, 'lookup_all_teams.php');
        $this->endpoint->teams(1);
    }

    /**
     * @throws Exception
     */
    public function testTeamsFilterLeagueID(): void
    {
        $this->endpoint->teams(1);

        $this->assertEquals(
            (new ListFilter())->setID(1),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testTeamsSearchInstances(): void
    {
        $this->serializerStub->method('serializeTeams')->willReturn([new Team()]);

        $teams = $this->endpoint->teamsSearch();

        $this->assertNotEmpty($teams);
        $this->assertContainsOnlyInstancesOf(Team::class, $teams);
    }

    /**
     * @throws Exception
     */
    public function testTeamsSearchFilterLeague(): void
    {
        $this->endpoint->teamsSearch('testLeague');

        $this->assertEquals(
            (new ListFilter())->setLeagueQuery('testLeague'),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testTeamsSearchFilterSport(): void
    {
        $this->endpoint->teamsSearch(null, 'testSport');

        $this->assertEquals(
            (new ListFilter())->setSportQuery('testSport'),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testTeamsSearchFilterCountry(): void
    {
        $this->endpoint->teamsSearch(null, null, 'testCountry');

        $this->assertEquals(
            (new ListFilter())->setCountryQuery('testCountry'),
            TestUtils::getHiddenProperty($this->endpoint, 'filter'));
    }

    /**
     * @throws Exception
     */
    public function testTeamsSearchEndpoint(): void
    {
        TestUtils::expectEndpoint($this->requestBuilderMock, 'search_all_teams.php');
        $this->endpoint->teamsSearch();
    }
}
