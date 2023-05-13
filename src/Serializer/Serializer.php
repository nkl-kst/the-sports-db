<?php

namespace NklKst\TheSportsDb\Serializer;

use Exception;
use NklKst\TheSportsDb\Entity\Country;
use NklKst\TheSportsDb\Entity\Equipment;
use NklKst\TheSportsDb\Entity\Event\Event;
use NklKst\TheSportsDb\Entity\Event\Highlight;
use NklKst\TheSportsDb\Entity\Event\Lineup;
use NklKst\TheSportsDb\Entity\Event\Livescore;
use NklKst\TheSportsDb\Entity\Event\Result;
use NklKst\TheSportsDb\Entity\Event\Statistic;
use NklKst\TheSportsDb\Entity\Event\Television;
use NklKst\TheSportsDb\Entity\Event\Timeline;
use NklKst\TheSportsDb\Entity\League;
use NklKst\TheSportsDb\Entity\Love;
use NklKst\TheSportsDb\Entity\Player\Contract;
use NklKst\TheSportsDb\Entity\Player\FormerTeam;
use NklKst\TheSportsDb\Entity\Player\Honor;
use NklKst\TheSportsDb\Entity\Player\Honour;
use NklKst\TheSportsDb\Entity\Player\Player;
use NklKst\TheSportsDb\Entity\Season;
use NklKst\TheSportsDb\Entity\Sport;
use NklKst\TheSportsDb\Entity\Table\Table;
use NklKst\TheSportsDb\Entity\Team;
use NklKst\TheSportsDb\Serializer\Event\EventSerializer;
use NklKst\TheSportsDb\Serializer\Event\HighlightSerializer;
use NklKst\TheSportsDb\Serializer\Event\LineupSerializer;
use NklKst\TheSportsDb\Serializer\Event\LivescoreSerializer;
use NklKst\TheSportsDb\Serializer\Event\ResultSerializer;
use NklKst\TheSportsDb\Serializer\Event\StatisticSerializer;
use NklKst\TheSportsDb\Serializer\Event\TelevisionSerializer;
use NklKst\TheSportsDb\Serializer\Event\TimelineSerializer;
use NklKst\TheSportsDb\Serializer\Player\ContractSerializer;
use NklKst\TheSportsDb\Serializer\Player\FormerTeamSerializer;
use NklKst\TheSportsDb\Serializer\Player\HonorSerializer;
use NklKst\TheSportsDb\Serializer\Player\HonourSerializer;
use NklKst\TheSportsDb\Serializer\Player\PlayerSerializer;
use NklKst\TheSportsDb\Serializer\Table\EntrySerializer;

class Serializer
{
    private ContractSerializer $contractSerializer;
    private CountrySerializer $countrySerializer;
    private EntrySerializer $entrySerializer;
    private EquipmentSerializer $equipmentSerializer;
    private EventSerializer $eventSerializer;
    private FormerTeamSerializer $formerTeamSerializer;
    private HighlightSerializer $highlightSerializer;
    private HonorSerializer $honorSerializer;
    private HonourSerializer $honourSerializer;
    private LeagueSerializer $leagueSerializer;
    private LineupSerializer $lineupSerializer;
    private LivescoreSerializer $livescoreSerializer;
    private LoveSerializer $loveSerializer;
    private PlayerSerializer $playerSerializer;
    private ResultSerializer $resultSerializer;
    private SeasonSerializer $seasonSerializer;
    private SportSerializer $sportSerializer;
    private StatisticSerializer $statisticSerializer;
    private TeamSerializer $teamSerializer;
    private TelevisionSerializer $televisionSerializer;
    private TimelineSerializer $timelineSerializer;

    public function __construct(
        ContractSerializer $contractSerializer,
        CountrySerializer $countrySerializer,
        EntrySerializer $entrySerializer,
        EquipmentSerializer $equipmentSerializer,
        EventSerializer $eventSerializer,
        FormerTeamSerializer $formerTeamSerializer,
        HighlightSerializer $highlightSerializer,
        HonorSerializer $honorSerializer,
        HonourSerializer $honourSerializer,
        LeagueSerializer $leagueSerializer,
        LineupSerializer $lineupSerializer,
        LivescoreSerializer $livescoreSerializer,
        LoveSerializer $loveSerializer,
        PlayerSerializer $playerSerializer,
        ResultSerializer $resultSerializer,
        SeasonSerializer $seasonSerializer,
        SportSerializer $sportSerializer,
        StatisticSerializer $statisticSerializer,
        TeamSerializer $teamSerializer,
        TelevisionSerializer $televisionSerializer,
        TimelineSerializer $timelineSerializer)
    {
        $this->contractSerializer = $contractSerializer;
        $this->countrySerializer = $countrySerializer;
        $this->entrySerializer = $entrySerializer;
        $this->equipmentSerializer = $equipmentSerializer;
        $this->eventSerializer = $eventSerializer;
        $this->formerTeamSerializer = $formerTeamSerializer;
        $this->honorSerializer = $honorSerializer;
        $this->honourSerializer = $honourSerializer;
        $this->highlightSerializer = $highlightSerializer;
        $this->leagueSerializer = $leagueSerializer;
        $this->lineupSerializer = $lineupSerializer;
        $this->livescoreSerializer = $livescoreSerializer;
        $this->loveSerializer = $loveSerializer;
        $this->playerSerializer = $playerSerializer;
        $this->resultSerializer = $resultSerializer;
        $this->seasonSerializer = $seasonSerializer;
        $this->sportSerializer = $sportSerializer;
        $this->statisticSerializer = $statisticSerializer;
        $this->teamSerializer = $teamSerializer;
        $this->televisionSerializer = $televisionSerializer;
        $this->timelineSerializer = $timelineSerializer;
    }

    /**
     * @return Contract[]
     *
     * @throws Exception
     */
    public function serializeContracts(string $content): array
    {
        return $this->contractSerializer->serialize($content);
    }

    /**
     * @return Country[]
     *
     * @throws Exception
     */
    public function serializeCountries(string $content): array
    {
        return $this->countrySerializer->serialize($content);
    }

    /**
     * @return Equipment[]
     *
     * @throws Exception
     */
    public function serializeEquipments(string $content): array
    {
        return $this->equipmentSerializer->serialize($content);
    }

    /**
     * @return Event[]
     *
     * @throws Exception
     */
    public function serializeEvents(string $content): array
    {
        return $this->eventSerializer->serialize($content);
    }

    /**
     * @return FormerTeam[]
     *
     * @throws Exception
     */
    public function serializeFormerTeams(string $content): array
    {
        return $this->formerTeamSerializer->serialize($content);
    }

    /**
     * @return Highlight[]
     *
     * @throws Exception
     */
    public function serializeHighlights(string $content): array
    {
        return $this->highlightSerializer->serialize($content);
    }

    /**
     * @deprecated Use serializeHonours() instead
     *
     * @return Honor[]
     *
     * @throws Exception
     */
    public function serializeHonors(string $content): array
    {
        return $this->honorSerializer->serialize($content); // @phpstan-ignore-line
    }

    /**
     * @return Honour[]
     *
     * @throws Exception
     */
    public function serializeHonours(string $content): array
    {
        return $this->honourSerializer->serialize($content);
    }

    /**
     * @return League[]
     *
     * @throws Exception
     */
    public function serializeLeagues(string $content): array
    {
        return $this->leagueSerializer->serialize($content);
    }

    /**
     * @return Lineup[]
     *
     * @throws Exception
     */
    public function serializeLineup(string $content): array
    {
        return $this->lineupSerializer->serialize($content);
    }

    /**
     * @return Livescore[]
     *
     * @throws Exception
     */
    public function serializeLivescores(string $content): array
    {
        return $this->livescoreSerializer->serialize($content);
    }

    /**
     * @return Love[]
     *
     * @throws Exception
     */
    public function serializeLoves(string $content): array
    {
        return $this->loveSerializer->serialize($content);
    }

    /**
     * @return Player[]
     *
     * @throws Exception
     */
    public function serializePlayers(string $content): array
    {
        return $this->playerSerializer->serialize($content);
    }

    /**
     * @return Result[]
     *
     * @throws Exception
     */
    public function serializeResults(string $content): array
    {
        return $this->resultSerializer->serialize($content);
    }

    /**
     * @return Season[]
     *
     * @throws Exception
     */
    public function serializeSeasons(string $content): array
    {
        return $this->seasonSerializer->serialize($content);
    }

    /**
     * @return Sport[]
     *
     * @throws Exception
     */
    public function serializeSports(string $content): array
    {
        return $this->sportSerializer->serialize($content);
    }

    /**
     * @return Statistic[]
     *
     * @throws Exception
     */
    public function serializeStatistics(string $content): array
    {
        return $this->statisticSerializer->serialize($content);
    }

    /**
     * @return Table Serialized table
     *
     * @throws Exception
     */
    public function serializeTable(string $content): Table
    {
        $table = new Table();
        $table->standings = $this->entrySerializer->serialize($content);
        $table->entries = $table->standings;

        return $table;
    }

    /**
     * @return Team[]
     *
     * @throws Exception
     */
    public function serializeTeams(string $content): array
    {
        return $this->teamSerializer->serialize($content);
    }

    /**
     * @return Television[]
     *
     * @throws Exception
     */
    public function serializeTelevision(string $content): array
    {
        return $this->televisionSerializer->serialize($content);
    }

    /**
     * @return Timeline[]
     *
     * @throws Exception
     */
    public function serializeTimeline(string $content): array
    {
        return $this->timelineSerializer->serialize($content);
    }
}
