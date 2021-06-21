<?php

namespace NklKst\TheSportsDb\Serializer;

use JsonMapper;
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
use NklKst\TheSportsDb\Serializer\Player\PlayerSerializer;
use NklKst\TheSportsDb\Serializer\Table\EntrySerializer;
use NklKst\TheSportsDb\Util\TestUtils;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NklKst\TheSportsDb\Serializer\CountrySerializer
 * @covers \NklKst\TheSportsDb\Serializer\Event\EventSerializer
 * @covers \NklKst\TheSportsDb\Serializer\Event\HighlightSerializer
 * @covers \NklKst\TheSportsDb\Serializer\Event\LineupSerializer
 * @covers \NklKst\TheSportsDb\Serializer\Event\LivescoreSerializer
 * @covers \NklKst\TheSportsDb\Serializer\Event\ResultSerializer
 * @covers \NklKst\TheSportsDb\Serializer\Event\StatisticSerializer
 * @covers \NklKst\TheSportsDb\Serializer\Event\TelevisionSerializer
 * @covers \NklKst\TheSportsDb\Serializer\Event\TimelineSerializer
 * @covers \NklKst\TheSportsDb\Serializer\LeagueSerializer
 * @covers \NklKst\TheSportsDb\Serializer\LoveSerializer
 * @covers \NklKst\TheSportsDb\Serializer\Player\ContractSerializer
 * @covers \NklKst\TheSportsDb\Serializer\Player\FormerTeamSerializer
 * @covers \NklKst\TheSportsDb\Serializer\Player\HonorSerializer
 * @covers \NklKst\TheSportsDb\Serializer\Player\PlayerSerializer
 * @covers \NklKst\TheSportsDb\Serializer\SeasonSerializer
 * @covers \NklKst\TheSportsDb\Serializer\SportSerializer
 * @covers \NklKst\TheSportsDb\Serializer\Table\EntrySerializer
 * @covers \NklKst\TheSportsDb\Serializer\TeamSerializer
 */
class ExtendedSerializerTest extends TestCase
{
    /**
     * @return class-string[][]
     */
    public function serializerProvider(): array
    {
        return [
            [ContractSerializer::class],
            [CountrySerializer::class],
            [EntrySerializer::class],
            [EventSerializer::class],
            [FormerTeamSerializer::class],
            [HighlightSerializer::class],
            [HonorSerializer::class],
            [LeagueSerializer::class],
            [LineupSerializer::class],
            [LivescoreSerializer::class],
            [LoveSerializer::class],
            [PlayerSerializer::class],
            [ResultSerializer::class],
            [SeasonSerializer::class],
            [SportSerializer::class],
            [StatisticSerializer::class],
            [TeamSerializer::class],
            [TelevisionSerializer::class],
            [TimelineSerializer::class],
        ];
    }

    /**
     * @dataProvider serializerProvider
     *
     * @param string $class Class to test
     */
    public function testGetEntityClass(string $class): void
    {
        $getEntityClass = TestUtils::getHiddenMethod(new $class(new JsonMapper()), 'getEntityClass');
        $this->assertNotNull($getEntityClass());
    }

    /**
     * @dataProvider serializerProvider
     *
     * @param string $class Class to test
     */
    public function testGetValidJsonRootNames(string $class): void
    {
        $getValidJsonRootNames =
            TestUtils::getHiddenMethod(new $class(new JsonMapper()), 'getValidJsonRootNames');
        $rootNames = $getValidJsonRootNames();

        $this->assertNotEmpty($rootNames);
        $this->assertContainsOnly('string', $rootNames);
    }
}
