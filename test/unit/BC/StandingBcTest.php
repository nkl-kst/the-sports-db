<?php

namespace NklKst\TheSportsDb\BC;

use Exception;
use JsonMapper;
use NklKst\TheSportsDb\Entity\Table\Entry;
use NklKst\TheSportsDb\Serializer\Table\EntrySerializer;
use PHPUnit\Framework\TestCase;

/**
 * @coversNothing
 */
class StandingBcTest extends TestCase
{
    private Entry $entry;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        $entrySerializer = new EntrySerializer(new JsonMapper());

        $tableJson = <<<'JSON'
{
  "table": [
    {
      "strBadge": "strTeamBadge"
    }
  ]
}
JSON;

        $this->entry = $entrySerializer->serialize($tableJson)[0];
    }

    /**
     * @return array<string[]>
     */
    public static function provideBcProperties(): array
    {
        return [
            ['strTeamBadge'],
        ];
    }

    /**
     * @dataProvider provideBcProperties
     */
    public function testBcProperties(string $bcProperty): void
    {
        BcTestUtils::checkBcProperty($this->entry, $bcProperty);
    }
}
