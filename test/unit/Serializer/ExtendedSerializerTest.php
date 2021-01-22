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

class ExtendedSerializerTest extends TestCase
{
    public function serializerProvider(): array
    {
        return [
            [ContractSerializer::class, false],
            [CountrySerializer::class, false],
            [EntrySerializer::class, false],
            [EventSerializer::class, false],
            [FormerTeamSerializer::class, false],
            [HighlightSerializer::class, false],
            [HonorSerializer::class, false],
            [LeagueSerializer::class, false],
            [LineupSerializer::class, false],
            [LivescoreSerializer::class, true],
            [LoveSerializer::class, false],
            [PlayerSerializer::class, false],
            [ResultSerializer::class, false],
            [SeasonSerializer::class, false],
            [SportSerializer::class, false],
            [StatisticSerializer::class, false],
            [TeamSerializer::class, false],
            [TelevisionSerializer::class, false],
            [TimelineSerializer::class, false],
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

    /**
     * @dataProvider serializerProvider
     *
     * @param string $class       Class to test
     * @param bool   $returnsNull Endpoint returns null or not
     */
    public function testEndpointReturnsNull(string $class, bool $returnsNull): void
    {
        $endpointReturnsNull =
            TestUtils::getHiddenMethod(new $class(new JsonMapper()), 'endpointReturnsNull');
        $this->assertSame($returnsNull, $endpointReturnsNull());
    }
}
