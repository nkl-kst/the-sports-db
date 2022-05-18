<?php

namespace NklKst\TheSportsDb\Client\Endpoint;

use Exception;
use NklKst\TheSportsDb\Entity\Equipment;
use NklKst\TheSportsDb\Entity\Event\Event;
use NklKst\TheSportsDb\Entity\Event\Lineup;
use NklKst\TheSportsDb\Entity\Event\Result;
use NklKst\TheSportsDb\Entity\Event\Statistic;
use NklKst\TheSportsDb\Entity\Event\Television;
use NklKst\TheSportsDb\Entity\Event\Timeline;
use NklKst\TheSportsDb\Entity\League;
use NklKst\TheSportsDb\Entity\Player\Contract;
use NklKst\TheSportsDb\Entity\Player\FormerTeam;
use NklKst\TheSportsDb\Entity\Player\Honor;
use NklKst\TheSportsDb\Entity\Player\Honour;
use NklKst\TheSportsDb\Entity\Player\Player;
use NklKst\TheSportsDb\Entity\Table\Table;
use NklKst\TheSportsDb\Entity\Team;
use NklKst\TheSportsDb\Filter\LookupFilter;

/**
 * Lookup endpoints.
 *
 * @author Nikolai Keist (github.com/nkl-kst)
 */
class LookupEndpoint extends AbstractEndpoint
{
    private const ENDPOINT_CONTRACTS = 'lookupcontracts.php';
    private const ENDPOINT_EQUIPMENT = 'lookupequipment.php';
    private const ENDPOINT_EVENT = 'lookupevent.php';
    private const ENDPOINT_FORMER_TEAMS = 'lookupformerteams.php';
    private const ENDPOINT_HONOUR = 'lookuphonours.php';
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
     * Get player contracts.
     *
     * @param int $playerID Player filter
     *
     * @return Contract[] Player contracts
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
     * Get team equipments.
     *
     * @param int $teamID Team filter
     *
     * @return Equipment[] Team equipments
     *
     * @throws Exception
     */
    public function equipments(int $teamID): array
    {
        $this
            ->setFilter((new LookupFilter())->setID($teamID))
            ->requestBuilder->setEndpoint(self::ENDPOINT_EQUIPMENT);

        return $this->serializer->serializeEquipments($this->request());
    }

    /**
     * Get event by ID.
     *
     * @throws Exception
     */
    public function event(int $eventID): ?Event
    {
        $this
            ->setFilter((new LookupFilter())->setID($eventID))
            ->requestBuilder->setEndpoint(self::ENDPOINT_EVENT);

        return $this->getSingleEntity($this->serializer->serializeEvents($this->request()));
    }

    /**
     * Get former teams by player.
     *
     * @param int $playerID Player filter
     *
     * @return FormerTeam[] Former teams
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
     * Get player honors.
     *
     * @deprecated Use honours() instead
     *
     * @param int $playerID Player filter
     *
     * @return Honor[] Player honors
     *
     * @throws Exception
     */
    public function honors(int $playerID): array
    {
        $this
            ->setFilter((new LookupFilter())->setID($playerID))
            ->requestBuilder->setEndpoint(self::ENDPOINT_HONOUR);

        return $this->serializer->serializeHonors($this->request());
    }

    /**
     * Get player honours.
     *
     * @param int $playerID Player filter
     *
     * @return Honour[] Player honours
     *
     * @throws Exception
     */
    public function honours(int $playerID): array
    {
        $this
            ->setFilter((new LookupFilter())->setID($playerID))
            ->requestBuilder->setEndpoint(self::ENDPOINT_HONOUR);

        return $this->serializer->serializeHonours($this->request());
    }

    /**
     * Get league by ID.
     *
     * @throws Exception
     */
    public function league(int $leagueID): ?League
    {
        $this
            ->setFilter((new LookupFilter())->setID($leagueID))
            ->requestBuilder->setEndpoint(self::ENDPOINT_LEAGUE);

        return $this->getSingleEntity($this->serializer->serializeLeagues($this->request()));
    }

    /**
     * Get event lineup.
     *
     * @param int $eventID Event filter
     *
     * @return Lineup[] Lineup (eg. Players, Drivers, etc.)
     *
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
     * Get player by ID.
     *
     * @throws Exception
     */
    public function player(int $playerID): ?Player
    {
        $this
            ->setFilter((new LookupFilter())->setID($playerID))
            ->requestBuilder->setEndpoint(self::ENDPOINT_PLAYER);

        return $this->getSingleEntity($this->serializer->serializePlayers($this->request()));
    }

    /**
     * Get event results.
     *
     * @param int $eventID Event filter
     *
     * @return Result[] Event results
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
     * Get event statistics.
     *
     * @param int $eventID Event filter
     *
     * @return Statistic[] Event statistics
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
     * Get league table, optionally by season.
     *
     * @param int     $leagueID League filter
     * @param ?string $season   Season filter
     *
     * @throws Exception
     */
    public function table(int $leagueID, string $season = null): ?Table
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
     * Get team by ID.
     *
     * @throws Exception
     */
    public function team(int $teamID): ?Team
    {
        $this
            ->setFilter((new LookupFilter())->setID($teamID))
            ->requestBuilder->setEndpoint(self::ENDPOINT_TEAM);

        return $this->getSingleEntity($this->serializer->serializeTeams($this->request()));
    }

    /**
     * Get TV show by event.
     *
     * @param int $eventID Event filter
     *
     * @return Television[] Event TV show
     *
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
     * Get event timeline.
     *
     * @param int $eventID Event filter
     *
     * @return Timeline[] Event timeline
     *
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
