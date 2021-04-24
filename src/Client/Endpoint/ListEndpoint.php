<?php

namespace NklKst\TheSportsDb\Client\Endpoint;

use Exception;
use NklKst\TheSportsDb\Entity\Country;
use NklKst\TheSportsDb\Entity\League;
use NklKst\TheSportsDb\Entity\Love;
use NklKst\TheSportsDb\Entity\Player\Player;
use NklKst\TheSportsDb\Entity\Season;
use NklKst\TheSportsDb\Entity\Sport;
use NklKst\TheSportsDb\Entity\Team;
use NklKst\TheSportsDb\Filter\ListFilter;

/**
 * List endpoints.
 *
 * @author Nikolai Keist (github.com/nkl-kst)
 */
class ListEndpoint extends AbstractEndpoint
{
    private const ENDPOINT_COUNTRIES = 'all_countries.php';
    private const ENDPOINT_LOVES = 'searchloves.php';
    private const ENDPOINT_LEAGUES = 'all_leagues.php';
    private const ENDPOINT_SEARCH_LEAGUES = 'search_all_leagues.php';
    private const ENDPOINT_LOOKUP_PLAYERS = 'lookup_all_players.php';
    private const ENDPOINT_SEARCH_SEASONS = 'search_all_seasons.php';
    private const ENDPOINT_SPORTS = 'all_sports.php';
    private const ENDPOINT_SEARCH_TEAMS = 'search_all_teams.php';
    private const ENDPOINT_LOOKUP_TEAMS = 'lookup_all_teams.php';

    /**
     * Get all countries.
     *
     * @return Country[] All countries
     *
     * @throws Exception
     */
    public function countries(): array
    {
        $this->requestBuilder->setEndpoint(self::ENDPOINT_COUNTRIES);

        return $this->serializer->serializeCountries($this->request());
    }

    /**
     * Get all leagues by country or sport query.
     *
     * @param ?string $countryQuery League country query
     * @param ?string $sportQuery   League sport query
     *
     * @return League[] Found leagues
     *
     * @throws Exception
     */
    public function leagues(string $countryQuery = null, string $sportQuery = null): array
    {
        $endpoint = $countryQuery || $sportQuery ? self::ENDPOINT_SEARCH_LEAGUES : self::ENDPOINT_LEAGUES;

        $filter = new ListFilter();
        if ($countryQuery) {
            $filter->setCountryQuery($countryQuery);
        }
        if ($sportQuery) {
            $filter->setSportQuery($sportQuery);
        }

        $this
            ->setFilter($filter)
            ->requestBuilder->setEndpoint($endpoint);

        return $this->serializer->serializeLeagues($this->request());
    }

    /**
     * Get all loved entities by user.
     *
     * @param string $user User filter
     *
     * @return Love[] Found entities
     *
     * @throws Exception
     */
    public function loves(string $user): array
    {
        $this
            ->setFilter((new ListFilter())->setUser($user))
            ->requestBuilder->setEndpoint(self::ENDPOINT_LOVES);

        return $this->serializer->serializeLoves($this->request());
    }

    /**
     * Get all players by team.
     *
     * @param int $teamID Team filter
     *
     * @return Player[] Found players
     *
     * @throws Exception
     */
    public function players(int $teamID): array
    {
        $this
            ->setFilter((new ListFilter())->setID($teamID))
            ->requestBuilder->setEndpoint(self::ENDPOINT_LOOKUP_PLAYERS);

        return $this->serializer->serializePlayers($this->request());
    }

    /**
     * Get all seasons by league.
     *
     * @param int $leagueID League filter
     *
     * @return Season[] Found seasons
     *
     * @throws Exception
     */
    public function seasons(int $leagueID): array
    {
        $this
            ->setFilter((new ListFilter())->setID($leagueID))
            ->requestBuilder->setEndpoint(self::ENDPOINT_SEARCH_SEASONS);

        return $this->serializer->serializeSeasons($this->request());
    }

    /**
     * Get all sport categories.
     *
     * @return Sport[] Found sport categories
     *
     * @throws Exception
     */
    public function sports(): array
    {
        $this->requestBuilder->setEndpoint(self::ENDPOINT_SPORTS);

        return $this->serializer->serializeSports($this->request());
    }

    /**
     * Get all teams by league.
     *
     * @param int $leagueID League filter
     *
     * @return Team[] Found teams
     *
     * @throws Exception
     */
    public function teams(int $leagueID): array
    {
        $this
            ->setFilter((new ListFilter())->setID($leagueID))
            ->requestBuilder->setEndpoint(self::ENDPOINT_LOOKUP_TEAMS);

        return $this->serializer->serializeTeams($this->request());
    }

    /**
     * Get all teams by league, sport or country query.
     *
     * @param ?string $leagueQuery  League query
     * @param ?string $sportQuery   Sport query
     * @param ?string $countryQuery Country query
     *
     * @return Team[] Found teams
     *
     * @throws Exception
     */
    public function teamsSearch(
        string $leagueQuery = null, string $sportQuery = null, string $countryQuery = null): array
    {
        $filter = new ListFilter();
        if ($leagueQuery) {
            $filter->setLeagueQuery($leagueQuery);
        }
        if ($sportQuery) {
            $filter->setSportQuery($sportQuery);
        }
        if ($countryQuery) {
            $filter->setCountryQuery($countryQuery);
        }

        $this
            ->setFilter($filter)
            ->requestBuilder->setEndpoint(self::ENDPOINT_SEARCH_TEAMS);

        return $this->serializer->serializeTeams($this->request());
    }
}
