<?php

namespace NklKst\TheSportsDb\Serializer;

use Exception;
use NklKst\TheSportsDb\Entity\Country;
use NklKst\TheSportsDb\Entity\Event\Event;
use NklKst\TheSportsDb\Entity\Event\Highlight;
use NklKst\TheSportsDb\Entity\Event\Lineup;
use NklKst\TheSportsDb\Entity\Event\Result;
use NklKst\TheSportsDb\Entity\Event\Statistic;
use NklKst\TheSportsDb\Entity\Event\Television;
use NklKst\TheSportsDb\Entity\Event\Timeline;
use NklKst\TheSportsDb\Entity\League;
use NklKst\TheSportsDb\Entity\Love;
use NklKst\TheSportsDb\Entity\Player\Contract;
use NklKst\TheSportsDb\Entity\Player\FormerTeam;
use NklKst\TheSportsDb\Entity\Player\Honor;
use NklKst\TheSportsDb\Entity\Player\Player;
use NklKst\TheSportsDb\Entity\Season;
use NklKst\TheSportsDb\Entity\Sport;
use NklKst\TheSportsDb\Entity\Table\Table;
use NklKst\TheSportsDb\Entity\Team;

interface SerializerInterface
{
    /**
     * @param string $content Content to serialize
     *
     * @return Contract[]
     *
     * @throws Exception
     */
    public function serializeContracts(string $content): array;

    /**
     * @param string $content Content to serialize
     *
     * @return Country[]
     *
     * @throws Exception
     */
    public function serializeCountries(string $content): array;

    /**
     * @param string $content Content to serialize
     *
     * @return Event[]
     *
     * @throws Exception
     */
    public function serializeEvents(string $content): array;

    /**
     * @param string $content Content to serialize
     *
     * @return FormerTeam[]
     *
     * @throws Exception
     */
    public function serializeFormerTeams(string $content): array;

    /**
     * @param string $content Content to serialize
     *
     * @return Highlight[]
     *
     * @throws Exception
     */
    public function serializeHighlights(string $content): array;

    /**
     * @param string $content Content to serialize
     *
     * @return Honor[]
     *
     * @throws Exception
     */
    public function serializeHonors(string $content): array;

    /**
     * @param string $content Content to serialize
     *
     * @return League[]
     *
     * @throws Exception
     */
    public function serializeLeagues(string $content): array;

    /**
     * @param string $content Content to serialize
     *
     * @return Lineup[]
     *
     * @throws Exception
     */
    public function serializeLineup(string $content): array;

    /**
     * @param string $content Content to serialize
     *
     * @return Love[]
     *
     * @throws Exception
     */
    public function serializeLoves(string $content): array;

    /**
     * @param string $content Content to serialize
     *
     * @return Player[]
     *
     * @throws Exception
     */
    public function serializePlayers(string $content): array;

    /**
     * @param string $content Content to serialize
     *
     * @return Result[]
     *
     * @throws Exception
     */
    public function serializeResults(string $content): array;

    /**
     * @param string $content Content to serialize
     *
     * @return Season[]
     *
     * @throws Exception
     */
    public function serializeSeasons(string $content): array;

    /**
     * @param string $content Content to serialize
     *
     * @return Sport[]
     *
     * @throws Exception
     */
    public function serializeSports(string $content): array;

    /**
     * @param string $content Content to serialize
     *
     * @return Statistic[]
     *
     * @throws Exception
     */
    public function serializeStatistics(string $content): array;

    /**
     * @param string $content Content to serialize
     *
     * @return Table Serialized table
     *
     * @throws Exception
     */
    public function serializeTable(string $content): Table;

    /**
     * @param string $content Content to serialize
     *
     * @return Team[]
     *
     * @throws Exception
     */
    public function serializeTeams(string $content): array;

    /**
     * @param string $content Content to serialize
     *
     * @return Television[]
     *
     * @throws Exception
     */
    public function serializeTelevision(string $content): array;

    /**
     * @param string $content Content to serialize
     *
     * @return Timeline[]
     *
     * @throws Exception
     */
    public function serializeTimeline(string $content): array;
}
