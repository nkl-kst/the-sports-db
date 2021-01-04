<?php

namespace NklKst\TheSportsDb\Serializer;

use NklKst\TheSportsDb\Entity\Table\Table;
use NklKst\TheSportsDb\Serializer\Event\EventSerializer;
use NklKst\TheSportsDb\Serializer\Event\ResultSerializer;
use NklKst\TheSportsDb\Serializer\Event\StatisticSerializer;
use NklKst\TheSportsDb\Serializer\Player\ContractSerializer;
use NklKst\TheSportsDb\Serializer\Player\FormerTeamSerializer;
use NklKst\TheSportsDb\Serializer\Player\HonorSerializer;
use NklKst\TheSportsDb\Serializer\Player\PlayerSerializer;
use NklKst\TheSportsDb\Serializer\Table\EntrySerializer;

class Serializer implements SerializerInterface
{
    private ContractSerializer $contractSerializer;
    private CountrySerializer $countrySerializer;
    private EntrySerializer $entrySerializer;
    private EventSerializer $eventSerializer;
    private FormerTeamSerializer $formerTeamSerializer;
    private HonorSerializer $honorSerializer;
    private LeagueSerializer $leagueSerializer;
    private LoveSerializer $loveSerializer;
    private PlayerSerializer $playerSerializer;
    private ResultSerializer $resultSerializer;
    private SeasonSerializer $seasonSerializer;
    private SportSerializer $sportSerializer;
    private StatisticSerializer $statisticSerializer;
    private TeamSerializer $teamSerializer;

    public function __construct(
        ContractSerializer $contractSerializer,
        CountrySerializer $countrySerializer,
        EntrySerializer $entrySerializer,
        EventSerializer $eventSerializer,
        FormerTeamSerializer $formerTeamSerializer,
        HonorSerializer $honorSerializer,
        LeagueSerializer $leagueSerializer,
        LoveSerializer $loveSerializer,
        PlayerSerializer $playerSerializer,
        ResultSerializer $resultSerializer,
        SeasonSerializer $seasonSerializer,
        SportSerializer $sportSerializer,
        StatisticSerializer $statisticSerializer,
        TeamSerializer $teamSerializer)
    {
        $this->contractSerializer = $contractSerializer;
        $this->countrySerializer = $countrySerializer;
        $this->entrySerializer = $entrySerializer;
        $this->eventSerializer = $eventSerializer;
        $this->formerTeamSerializer = $formerTeamSerializer;
        $this->honorSerializer = $honorSerializer;
        $this->leagueSerializer = $leagueSerializer;
        $this->loveSerializer = $loveSerializer;
        $this->playerSerializer = $playerSerializer;
        $this->resultSerializer = $resultSerializer;
        $this->seasonSerializer = $seasonSerializer;
        $this->sportSerializer = $sportSerializer;
        $this->statisticSerializer = $statisticSerializer;
        $this->teamSerializer = $teamSerializer;
    }

    /**
     * {@inheritDoc}
     */
    public function serializeContracts(string $content): array
    {
        return $this->contractSerializer->serialize($content);
    }

    /**
     * {@inheritDoc}
     */
    public function serializeCountries(string $content): array
    {
        return $this->countrySerializer->serialize($content);
    }

    /**
     * {@inheritDoc}
     */
    public function serializeEvents(string $content): array
    {
        return $this->eventSerializer->serialize($content);
    }

    /**
     * {@inheritDoc}
     */
    public function serializeFormerTeams(string $content): array
    {
        return $this->formerTeamSerializer->serialize($content);
    }

    /**
     * {@inheritDoc}
     */
    public function serializeHonors(string $content): array
    {
        return $this->honorSerializer->serialize($content);
    }

    /**
     * {@inheritDoc}
     */
    public function serializeLeagues(string $content): array
    {
        return $this->leagueSerializer->serialize($content);
    }

    /**
     * {@inheritDoc}
     */
    public function serializeLoves(string $content): array
    {
        return $this->loveSerializer->serialize($content);
    }

    /**
     * {@inheritDoc}
     */
    public function serializePlayers(string $content): array
    {
        return $this->playerSerializer->serialize($content);
    }

    /**
     * {@inheritDoc}
     */
    public function serializeResults(string $content): array
    {
        return $this->resultSerializer->serialize($content);
    }

    /**
     * {@inheritDoc}
     */
    public function serializeSeasons(string $content): array
    {
        return $this->seasonSerializer->serialize($content);
    }

    /**
     * {@inheritDoc}
     */
    public function serializeSports(string $content): array
    {
        return $this->sportSerializer->serialize($content);
    }

    /**
     * {@inheritDoc}
     */
    public function serializeStatistics(string $content): array
    {
        return $this->statisticSerializer->serialize($content);
    }

    /**
     * {@inheritDoc}
     */
    public function serializeTable(string $content): Table
    {
        $table = new Table();
        $table->entries = $this->entrySerializer->serialize($content);

        return $table;
    }

    /**
     * {@inheritDoc}
     */
    public function serializeTeams(string $content): array
    {
        return $this->teamSerializer->serialize($content);
    }
}