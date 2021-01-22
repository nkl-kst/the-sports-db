<?php

namespace NklKst\TheSportsDb\Client\Endpoint;

use NklKst\TheSportsDb\Entity\Country;
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
use NklKst\TheSportsDb\Entity\Player\Player;
use NklKst\TheSportsDb\Entity\Season;
use NklKst\TheSportsDb\Entity\Sport;
use NklKst\TheSportsDb\Entity\Table\Entry;
use NklKst\TheSportsDb\Entity\Table\Table;
use NklKst\TheSportsDb\Entity\Team;
use NklKst\TheSportsDb\Serializer\SerializerInterface;

class SerializerMock implements SerializerInterface
{
    private function createMockedEntityArray($class, $field, $value): array
    {
        $entity = new $class();
        $entity->$field = $value;

        return [$entity];
    }

    /**
     * {@inheritDoc}
     */
    public function serializeContracts(string $content): array
    {
        return $this->createMockedEntityArray(Contract::class, 'strSport', $content);
    }

    /**
     * {@inheritDoc}
     */
    public function serializeCountries(string $content): array
    {
        return $this->createMockedEntityArray(Country::class, 'name_en', $content);
    }

    /**
     * {@inheritDoc}
     */
    public function serializeEvents(string $content): array
    {
        return $this->createMockedEntityArray(Event::class, 'strEvent', $content);
    }

    /**
     * {@inheritDoc}
     */
    public function serializeFormerTeams(string $content): array
    {
        return $this->createMockedEntityArray(FormerTeam::class, 'strFormerTeam', $content);
    }

    /**
     * {@inheritDoc}
     */
    public function serializeHighlights(string $content): array
    {
        return $this->createMockedEntityArray(Highlight::class, 'strVideo', $content);
    }

    /**
     * {@inheritDoc}
     */
    public function serializeHonors(string $content): array
    {
        return $this->createMockedEntityArray(Honor::class, 'strHonour', $content);
    }

    /**
     * {@inheritDoc}
     */
    public function serializeLeagues(string $content): array
    {
        return $this->createMockedEntityArray(League::class, 'strLeague', $content);
    }

    /**
     * {@inheritDoc}
     */
    public function serializeLineup(string $content): array
    {
        return $this->createMockedEntityArray(Lineup::class, 'strPosition', $content);
    }

    /**
     * {@inheritDoc}
     */
    public function serializeLivescores(string $content): array
    {
        return $this->createMockedEntityArray(Livescore::class, 'strProgress', $content);
    }

    /**
     * {@inheritDoc}
     */
    public function serializeLoves(string $content): array
    {
        return $this->createMockedEntityArray(Love::class, 'strUsername', $content);
    }

    /**
     * {@inheritDoc}
     */
    public function serializePlayers(string $content): array
    {
        return $this->createMockedEntityArray(Player::class, 'strPlayer', $content);
    }

    /**
     * {@inheritDoc}
     */
    public function serializeResults(string $content): array
    {
        return $this->createMockedEntityArray(Result::class, 'strResult', $content);
    }

    /**
     * {@inheritDoc}
     */
    public function serializeSeasons(string $content): array
    {
        return $this->createMockedEntityArray(Season::class, 'strSeason', $content);
    }

    /**
     * {@inheritDoc}
     */
    public function serializeSports(string $content): array
    {
        return $this->createMockedEntityArray(Sport::class, 'strSport', $content);
    }

    /**
     * {@inheritDoc}
     */
    public function serializeStatistics(string $content): array
    {
        return $this->createMockedEntityArray(Statistic::class, 'strStat', $content);
    }

    /**
     * {@inheritDoc}
     */
    public function serializeTable(string $content): Table
    {
        $entry = new Entry();
        $entry->name = $content;
        $table = new Table();
        $table->entries = [$entry];

        return $table;
    }

    /**
     * {@inheritDoc}
     */
    public function serializeTeams(string $content): array
    {
        return $this->createMockedEntityArray(Team::class, 'strTeam', $content);
    }

    /**
     * {@inheritDoc}
     */
    public function serializeTelevision(string $content): array
    {
        return $this->createMockedEntityArray(Television::class, 'strChannel', $content);
    }

    /**
     * {@inheritDoc}
     */
    public function serializeTimeline(string $content): array
    {
        return $this->createMockedEntityArray(Timeline::class, 'strTimeline', $content);
    }
}
