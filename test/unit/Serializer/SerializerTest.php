<?php

namespace NklKst\TheSportsDb\Serializer;

use Exception;
use JsonMapper;
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
use PHPUnit\Framework\TestCase;

/**
 * @covers \NklKst\TheSportsDb\Serializer\Serializer
 */
class SerializerTest extends TestCase
{
    private Serializer $serializer;

    protected function setUp(): void
    {
        $mapper = new JsonMapper();
        $this->serializer = new Serializer(
            new ContractSerializer($mapper),
            new CountrySerializer($mapper),
            new EntrySerializer($mapper),
            new EquipmentSerializer($mapper),
            new EventSerializer($mapper),
            new FormerTeamSerializer($mapper),
            new HighlightSerializer($mapper),
            new HonorSerializer($mapper),
            new HonourSerializer($mapper),
            new LeagueSerializer($mapper),
            new LineupSerializer($mapper),
            new LivescoreSerializer($mapper),
            new LoveSerializer($mapper),
            new PlayerSerializer($mapper),
            new ResultSerializer($mapper),
            new SeasonSerializer($mapper),
            new SportSerializer($mapper),
            new StatisticSerializer($mapper),
            new TeamSerializer($mapper),
            new TelevisionSerializer($mapper),
            new TimelineSerializer($mapper),
        );
    }

    /**
     * @throws Exception
     */
    public function testSerializeContracts(): void
    {
        $contracts = $this->serializer->serializeContracts('{ "contracts": [] }');
        $this->assertContainsOnlyInstancesOf(Contract::class, $contracts);
    }

    /**
     * @throws Exception
     */
    public function testSerializeCountries(): void
    {
        $countries = $this->serializer->serializeCountries('{ "countries": [] }');
        $this->assertContainsOnlyInstancesOf(Country::class, $countries);
    }

    /**
     * @throws Exception
     */
    public function testSerializeEquipments(): void
    {
        $equipments = $this->serializer->serializeEquipments('{ "equipment": [] }');
        $this->assertContainsOnlyInstancesOf(Equipment::class, $equipments);
    }

    /**
     * @throws Exception
     */
    public function testSerializeEvents(): void
    {
        $events = $this->serializer->serializeEvents('{ "events": [] }');
        $this->assertContainsOnlyInstancesOf(Event::class, $events);
    }

    /**
     * @throws Exception
     */
    public function testSerializeFormerTeams(): void
    {
        $formerTeams = $this->serializer->serializeFormerTeams('{ "formerteams": [] }');
        $this->assertContainsOnlyInstancesOf(FormerTeam::class, $formerTeams);
    }

    /**
     * @throws Exception
     */
    public function testSerializeHighlights(): void
    {
        $highlights = $this->serializer->serializeHighlights('{ "tvhighlights": [] }');
        $this->assertContainsOnlyInstancesOf(Highlight::class, $highlights);
    }

    /**
     * @throws Exception
     */
    public function testSerializeHonors(): void
    {
        $honors = $this->serializer->serializeHonors('{ "honors": [] }');
        $this->assertContainsOnlyInstancesOf(Honor::class, $honors);
    }

    /**
     * @throws Exception
     */
    public function testSerializeHonours(): void
    {
        $honours = $this->serializer->serializeHonours('{ "honours": [] }');
        $this->assertContainsOnlyInstancesOf(Honour::class, $honours);
    }

    /**
     * @throws Exception
     */
    public function testSerializeLeagues(): void
    {
        $leagues = $this->serializer->serializeLeagues('{ "leagues": [] }');
        $this->assertContainsOnlyInstancesOf(League::class, $leagues);
    }

    /**
     * @throws Exception
     */
    public function testSerializeLineup(): void
    {
        $lineup = $this->serializer->serializeLineup('{ "lineup": [] }');
        $this->assertContainsOnlyInstancesOf(Lineup::class, $lineup);
    }

    /**
     * @throws Exception
     */
    public function testSerializeLivescores(): void
    {
        $lineup = $this->serializer->serializeLivescores('{ "events": [] }');
        $this->assertContainsOnlyInstancesOf(Livescore::class, $lineup);
    }

    /**
     * @throws Exception
     */
    public function testSerializeLoves(): void
    {
        $loves = $this->serializer->serializeLoves('{ "players": [] }');
        $this->assertContainsOnlyInstancesOf(Love::class, $loves);
    }

    /**
     * @throws Exception
     */
    public function testSerializePlayers(): void
    {
        $players = $this->serializer->serializePlayers('{ "players": [] }');
        $this->assertContainsOnlyInstancesOf(Player::class, $players);
    }

    /**
     * @throws Exception
     */
    public function testSerializeResults(): void
    {
        $results = $this->serializer->serializeResults('{ "results": [] }');
        $this->assertContainsOnlyInstancesOf(Result::class, $results);
    }

    /**
     * @throws Exception
     */
    public function testSerializeSeasons(): void
    {
        $seasons = $this->serializer->serializeSeasons('{ "seasons": [] }');
        $this->assertContainsOnlyInstancesOf(Season::class, $seasons);
    }

    /**
     * @throws Exception
     */
    public function testSerializeSports(): void
    {
        $sports = $this->serializer->serializeSports('{ "sports": [] }');
        $this->assertContainsOnlyInstancesOf(Sport::class, $sports);
    }

    /**
     * @throws Exception
     */
    public function testSerializeStatistics(): void
    {
        $statistics = $this->serializer->serializeStatistics('{ "eventstats": [] }');
        $this->assertContainsOnlyInstancesOf(Statistic::class, $statistics);
    }

    /**
     * @throws Exception
     */
    public function testSerializeTable(): void
    {
        $table = $this->serializer->serializeTable('{ "table": [] }');
        $this->assertInstanceOf(Table::class, $table);
    }

    /**
     * @throws Exception
     */
    public function testSerializeTeams(): void
    {
        $teams = $this->serializer->serializeTeams('{ "teams": [] }');
        $this->assertContainsOnlyInstancesOf(Team::class, $teams);
    }

    /**
     * @throws Exception
     */
    public function testSerializeTelevision(): void
    {
        $television = $this->serializer->serializeTelevision('{ "tvevent": [] }');
        $this->assertContainsOnlyInstancesOf(Television::class, $television);
    }

    /**
     * @throws Exception
     */
    public function testSerializeTimeline(): void
    {
        $timeline = $this->serializer->serializeTimeline('{ "timeline": [] }');
        $this->assertContainsOnlyInstancesOf(Timeline::class, $timeline);
    }
}
