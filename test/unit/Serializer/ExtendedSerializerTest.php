<?php

namespace NklKst\TheSportsDb\Serializer;

use JsonMapper;
use NklKst\TheSportsDb\Serializer\Event\EventSerializer;
use NklKst\TheSportsDb\Serializer\Event\HighlightSerializer;
use NklKst\TheSportsDb\Serializer\Event\LineupSerializer;
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

class ExtendedSerializerTest extends TestCase
{
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
        $method = TestUtils::getHiddenMethod(new $class(new JsonMapper()), 'getEntityClass');
        $this->assertNotNull($method());
    }

    /**
     * @dataProvider serializerProvider
     *
     * @param string $class Class to test
     */
    public function testGetValidJsonRootNames(string $class): void
    {
        $method = TestUtils::getHiddenMethod(new $class(new JsonMapper()), 'getValidJsonRootNames');
        $rootNames = $method();

        $this->assertNotEmpty($rootNames);
        $this->assertContainsOnly('string', $rootNames);
    }
}
