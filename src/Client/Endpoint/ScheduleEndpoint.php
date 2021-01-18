<?php

namespace NklKst\TheSportsDb\Client\Endpoint;

use DateTime;
use Exception;
use NklKst\TheSportsDb\Entity\Event\Event;
use NklKst\TheSportsDb\Entity\Event\Television;
use NklKst\TheSportsDb\Filter\ScheduleFilter;

class ScheduleEndpoint extends AbstractEndpoint
{
    private const ENDPOINT_DAY = 'eventsday.php';
    private const ENDPOINT_LEAGUE_NEXT = 'eventsnextleague.php';
    private const ENDPOINT_LEAGUE_LAST = 'eventspastleague.php';
    private const ENDPOINT_ROUND = 'eventsround.php';
    private const ENDPOINT_SEASON = 'eventsseason.php';
    private const ENDPOINT_TEAM_NEXT = 'eventsnext.php';
    private const ENDPOINT_TEAM_LAST = 'eventslast.php';
    private const ENDPOINT_TELEVISION = 'eventstv.php';

    /**
     * @return Event[]
     *
     * @throws Exception
     */
    public function day(DateTime $day, string $sportQuery = null, string $leagueQuery = null): array
    {
        $filter = (new ScheduleFilter())->setDay($day);
        if ($sportQuery) {
            $filter->setSportQuery($sportQuery);
        }
        if ($leagueQuery) {
            $filter->setLeagueQuery($leagueQuery);
        }

        $this
            ->setFilter($filter)
            ->requestBuilder->setEndpoint(self::ENDPOINT_DAY);

        return $this->serializer->serializeEvents($this->request());
    }

    /**
     * @return Event[]
     *
     * @throws Exception
     */
    public function leagueNext(int $leagueID): array
    {
        $this
            ->setFilter((new ScheduleFilter())->setID($leagueID))
            ->requestBuilder->setEndpoint(self::ENDPOINT_LEAGUE_NEXT);

        return $this->serializer->serializeEvents($this->request());
    }

    /**
     * @return Event[]
     *
     * @throws Exception
     */
    public function leagueLast(int $leagueID): array
    {
        $this
            ->setFilter((new ScheduleFilter())->setID($leagueID))
            ->requestBuilder->setEndpoint(self::ENDPOINT_LEAGUE_LAST);

        return $this->serializer->serializeEvents($this->request());
    }

    /**
     * @return Event[]
     *
     * @throws Exception
     */
    public function round(int $leagueID, int $round, string $season = null): array
    {
        $filter = (new ScheduleFilter())->setID($leagueID)->setRound($round);
        if ($season) {
            $filter->setSeason($season);
        }

        $this
            ->setFilter($filter)
            ->requestBuilder->setEndpoint(self::ENDPOINT_ROUND);

        return $this->serializer->serializeEvents($this->request());
    }

    /**
     * @return Event[]
     *
     * @throws Exception
     */
    public function season(int $leagueID, string $season = null): array
    {
        $filter = (new ScheduleFilter())->setID($leagueID);
        if ($season) {
            $filter->setSeason($season);
        }

        $this
            ->setFilter($filter)
            ->requestBuilder->setEndpoint(self::ENDPOINT_SEASON);

        return $this->serializer->serializeEvents($this->request());
    }

    /**
     * @return Event[]
     *
     * @throws Exception
     */
    public function teamNext(int $teamID): array
    {
        $this
            ->setFilter((new ScheduleFilter())->setID($teamID))
            ->requestBuilder->setEndpoint(self::ENDPOINT_TEAM_NEXT);

        return $this->serializer->serializeEvents($this->request());
    }

    /**
     * @return Event[]
     *
     * @throws Exception
     */
    public function teamLast(int $teamID): array
    {
        $this
            ->setFilter((new ScheduleFilter())->setID($teamID))
            ->requestBuilder->setEndpoint(self::ENDPOINT_TEAM_LAST);

        return $this->serializer->serializeEvents($this->request());
    }

    /**
     * @return Television[]
     *
     * @throws Exception
     */
    public function television(DateTime $day, string $sportQuery = null, string $countryQuery = null): array
    {
        $filter = (new ScheduleFilter())->setDay($day);
        if ($sportQuery) {
            $filter->setSportQuery($sportQuery);
        }
        if ($countryQuery) {
            $filter->setCountryQuery($countryQuery);
        }

        $this
            ->setFilter($filter)
            ->requestBuilder->setEndpoint(self::ENDPOINT_TELEVISION);

        return $this->serializer->serializeTelevision($this->request());
    }

    /**
     * @return Television[]
     *
     * @throws Exception
     */
    public function televisionChannel(string $channel): array
    {
        $this
            ->setFilter((new ScheduleFilter())->setChannel($channel))
            ->requestBuilder->setEndpoint(self::ENDPOINT_TELEVISION);

        return $this->serializer->serializeTelevision($this->request());
    }
}
