<?php

namespace NklKst\TheSportsDb\Client\Endpoint;

use Exception;
use NklKst\TheSportsDb\Entity\Event\Event;
use NklKst\TheSportsDb\Entity\Event\Result;
use NklKst\TheSportsDb\Entity\Event\Statistic;
use NklKst\TheSportsDb\Entity\League;
use NklKst\TheSportsDb\Entity\Player\Contract;
use NklKst\TheSportsDb\Entity\Player\FormerTeam;
use NklKst\TheSportsDb\Entity\Player\Honor;
use NklKst\TheSportsDb\Entity\Player\Player;
use NklKst\TheSportsDb\Entity\Table\Table;
use NklKst\TheSportsDb\Entity\Team;
use NklKst\TheSportsDb\Filter\LookupFilter;

class LookupEndpoint extends AbstractEndpoint
{
    private const ENDPOINT_CONTRACTS = 'lookupcontracts.php';
    private const ENDPOINT_EVENT = 'lookupevent.php';
    private const ENDPOINT_FORMER_TEAMS = 'lookupformerteams.php';
    private const ENDPOINT_HONOR = 'lookuphonors.php';
    private const ENDPOINT_LEAGUE = 'lookupleague.php';
    private const ENDPOINT_LINEUP = 'lookuplineup.php';
    private const ENDPOINT_PLAYER = 'lookupplayer.php';
    private const ENDPOINT_RESULT = 'eventresults.php';
    private const ENDPOINT_STATISTICS = 'lookupeventstats.php';
    private const ENDPOINT_TABLE = 'lookuptable.php';
    private const ENDPOINT_TEAM = 'lookupteam.php';
    private const ENDPOINT_TELEVISION = 'lookuptv.php';
    private const ENDPOINT_TIMELINE = 'lookuptimeline.php';

    /**
     * @return Contract[]
     *
     * @throws Exception
     */
    public function contracts(int $playerID): array
    {
        $this
            ->setFilter((new LookupFilter())->setID($playerID))
            ->requestBuilder->setEndpoint(self::ENDPOINT_CONTRACTS);

        return $this->serializer->serializeContracts($this->request());
    }

    /**
     * @throws Exception
     */
    public function event(int $eventID): Event
    {
        $this
            ->setFilter((new LookupFilter())->setID($eventID))
            ->requestBuilder->setEndpoint(self::ENDPOINT_EVENT);

        return $this->getSingleEntity($this->serializer->serializeEvents($this->request()));
    }

    /**
     * @return FormerTeam[]
     *
     * @throws Exception
     */
    public function formerTeams(int $playerID): array
    {
        $this
            ->setFilter((new LookupFilter())->setID($playerID))
            ->requestBuilder->setEndpoint(self::ENDPOINT_FORMER_TEAMS);

        return $this->serializer->serializeFormerTeams($this->request());
    }

    /**
     * @return Honor[]
     *
     * @throws Exception
     */
    public function honors(int $playerID): array
    {
        $this
            ->setFilter((new LookupFilter())->setID($playerID))
            ->requestBuilder->setEndpoint(self::ENDPOINT_HONOR);

        return $this->serializer->serializeHonors($this->request());
    }

    /**
     * @throws Exception
     */
    public function league(int $leagueID): League
    {
        $this
            ->setFilter((new LookupFilter())->setID($leagueID))
            ->requestBuilder->setEndpoint(self::ENDPOINT_LEAGUE);

        return $this->getSingleEntity($this->serializer->serializeLeagues($this->request()));
    }

    /**
     * @throws Exception
     */
    public function lineup(int $eventID): array
    {
        $this
            ->setFilter((new LookupFilter())->setID($eventID))
            ->requestBuilder->setEndpoint(self::ENDPOINT_LINEUP);

        return $this->serializer->serializeLineup($this->request());
    }

    /**
     * @throws Exception
     */
    public function player(int $playerID): Player
    {
        $this
            ->setFilter((new LookupFilter())->setID($playerID))
            ->requestBuilder->setEndpoint(self::ENDPOINT_PLAYER);

        return $this->getSingleEntity($this->serializer->serializePlayers($this->request()));
    }

    /**
     * @return Result[]
     *
     * @throws Exception
     */
    public function results(int $eventID): array
    {
        $this
            ->setFilter((new LookupFilter())->setID($eventID))
            ->requestBuilder->setEndpoint(self::ENDPOINT_RESULT);

        return $this->serializer->serializeResults($this->request());
    }

    /**
     * @return Statistic[]
     *
     * @throws Exception
     */
    public function statistics(int $eventID): array
    {
        $this
            ->setFilter((new LookupFilter())->setID($eventID))
            ->requestBuilder->setEndpoint(self::ENDPOINT_STATISTICS);

        return $this->serializer->serializeStatistics($this->request());
    }

    /**
     * @throws Exception
     */
    public function table(int $leagueID, string $season = null): Table
    {
        $filter = (new LookupFilter())->setLeagueID($leagueID);
        if ($season) {
            $filter->setSeason($season);
        }
        $this
            ->setFilter($filter)
            ->requestBuilder->setEndpoint(self::ENDPOINT_TABLE);

        return $this->serializer->serializeTable($this->request());
    }

    /**
     * @throws Exception
     */
    public function team(int $teamID): Team
    {
        $this
            ->setFilter((new LookupFilter())->setID($teamID))
            ->requestBuilder->setEndpoint(self::ENDPOINT_TEAM);

        return $this->getSingleEntity($this->serializer->serializeTeams($this->request()));
    }

    /**
     * @throws Exception
     */
    public function television(int $eventID): array
    {
        $this
            ->setFilter((new LookupFilter())->setID($eventID))
            ->requestBuilder->setEndpoint(self::ENDPOINT_TELEVISION);

        return $this->serializer->serializeTelevision($this->request());
    }

    /**
     * @throws Exception
     */
    public function timeline(int $eventID): array
    {
        $this
            ->setFilter((new LookupFilter())->setID($eventID))
            ->requestBuilder->setEndpoint(self::ENDPOINT_TIMELINE);

        return $this->serializer->serializeTimeline($this->request());
    }
}
