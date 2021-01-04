<?php

namespace NklKst\TheSportsDb\Client\Endpoint;

use Exception;
use NklKst\TheSportsDb\Entity\Event\Event;
use NklKst\TheSportsDb\Entity\Player\Player;
use NklKst\TheSportsDb\Entity\Team;
use NklKst\TheSportsDb\Filter\SearchFilter;

class SearchEndpoint extends AbstractEndpoint
{
    private const ENDPOINT_EVENTS = 'searchevents.php';
    private const ENDPOINT_FILE = 'searchfilename.php';
    private const ENDPOINT_PLAYERS = 'searchplayers.php';
    private const ENDPOINT_TEAMS = 'searchteams.php';

    /**
     * @return Event[]
     *
     * @throws Exception
     */
    public function events(string $eventQuery, string $season = null): array
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
     * @throws Exception
     */
    public function eventFile(string $file): Event
    {
        $this
            ->setFilter((new SearchFilter())->setEventQuery($file))
            ->requestBuilder->setEndpoint(self::ENDPOINT_FILE);

        return $this->getSingleEntity($this->serializer->serializeEvents($this->request()));
    }

    /**
     * @return Player[]
     *
     * @throws Exception
     */
    public function players(string $playerQuery = null, string $teamQuery = null): array
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
     * @return Team[]
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
}
