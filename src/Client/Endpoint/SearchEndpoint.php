<?php

namespace NklKst\TheSportsDb\Client\Endpoint;

use Exception;
use NklKst\TheSportsDb\Entity\Event\Event;
use NklKst\TheSportsDb\Entity\Player\Player;
use NklKst\TheSportsDb\Entity\Team;
use NklKst\TheSportsDb\Entity\Venue;
use NklKst\TheSportsDb\Filter\SearchFilter;

/**
 * Search endpoints.
 *
 * @author Nikolai Keist (github.com/nkl-kst)
 */
class SearchEndpoint extends AbstractEndpoint
{
    private const ENDPOINT_EVENTS = 'searchevents.php';
    private const ENDPOINT_FILE = 'searchfilename.php';
    private const ENDPOINT_PLAYERS = 'searchplayers.php';
    private const ENDPOINT_TEAMS = 'searchteams.php';
    private const ENDPOINT_VENUES = 'searchvenues.php';

    /**
     * Find events by query, optionally filtered by season.
     *
     * @param string  $eventQuery Event query
     * @param ?string $season     Season filter
     *
     * @return Event[] Found events
     *
     * @throws Exception
     */
    public function events(string $eventQuery, ?string $season = null): array
    {
        $filter = (new SearchFilter())->setEventQuery($eventQuery);
        if ($season) {
            $filter->setSeason($season);
        }

        $this
            ->setFilter($filter)
            ->requestBuilder->setEndpoint(self::ENDPOINT_EVENTS);

        return $this->serializer->serializeEvents($this->request());
    }

    /**
     * Find event by file name.
     *
     * @param string $file File name
     *
     * @throws Exception
     */
    public function eventFile(string $file): ?Event
    {
        $this
            ->setFilter((new SearchFilter())->setEventQuery($file))
            ->requestBuilder->setEndpoint(self::ENDPOINT_FILE);

        return $this->getSingleEntity($this->serializer->serializeEvents($this->request()));
    }

    /**
     * Find players, optionally filtered by player or team query.
     *
     * @param ?string $playerQuery Player query
     * @param ?string $teamQuery   Team query
     *
     * @return Player[] Found players
     *
     * @throws Exception
     */
    public function players(?string $playerQuery = null, ?string $teamQuery = null): array
    {
        $filter = new SearchFilter();

        if ($playerQuery) {
            $filter->setPlayerQuery($playerQuery);
        }

        if ($teamQuery) {
            $filter->setTeamQuery($teamQuery);
        }

        $this
            ->setFilter($filter)
            ->requestBuilder->setEndpoint(self::ENDPOINT_PLAYERS);

        return $this->serializer->serializePlayers($this->request());
    }

    /**
     * Find teams by name or shortname query.
     *
     * @param string $teamQuery    Name or shortname query
     * @param bool   $isShortQuery Query by shortname
     *
     * @return Team[] Found teams
     *
     * @throws Exception
     */
    public function teams(string $teamQuery, bool $isShortQuery = false): array
    {
        $filter = new SearchFilter();
        if ($isShortQuery) {
            $filter->setTeamShortQuery($teamQuery);
        } else {
            $filter->setTeamQuery($teamQuery);
        }

        $this
            ->setFilter($filter)
            ->requestBuilder->setEndpoint(self::ENDPOINT_TEAMS);

        return $this->serializer->serializeTeams($this->request());
    }

    /**
     * Find venues by name.
     *
     * @param string $venueQuery Name query
     *
     * @return Venue[] Found venues
     *
     * @throws Exception
     */
    public function venues(string $venueQuery): array
    {
        $this
            ->setFilter((new SearchFilter())->setVenueQuery($venueQuery))
            ->requestBuilder->setEndpoint(self::ENDPOINT_VENUES)
        ;

        return $this->serializer->serializeVenues($this->request());
    }
}
