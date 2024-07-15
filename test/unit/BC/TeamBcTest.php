<?php

namespace NklKst\TheSportsDb\BC;

use Exception;
use JsonMapper;
use NklKst\TheSportsDb\Entity\Team;
use NklKst\TheSportsDb\Serializer\TeamSerializer;
use PHPUnit\Framework\TestCase;

/**
 * @coversNothing
 */
class TeamBcTest extends TestCase
{
    private Team $team;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        $teamSerializer = new TeamSerializer(new JsonMapper());

        $teamJson = <<<'JSON'
{
  "teams": [
    {
      "strTeamAlternate": "strAlternate",
      "strLocation":      "strStadiumLocation",
      "strBadge":         "strTeamBadge",
      "strBanner":        "strTeamBanner",
      "strKit":           "strTeamJersey",
      "strLogo":          "strTeamLogo",
      "strColour1":       "strKitColour1",
      "strColour2":       "strKitColour2",
      "strColour3":       "strKitColour3",
      "strFanart1":       "strTeamFanart1",
      "strFanart2":       "strTeamFanart2",
      "strFanart3":       "strTeamFanart3",
      "strFanart4":       "strTeamFanart4"
    }
  ]
}
JSON;

        $this->team = $teamSerializer->serialize($teamJson)[0];
    }

    /**
     * @return array<string[]>
     */
    public static function provideBcProperties(): array
    {
        return [
            ['strAlternate'],
            ['strStadiumLocation'],
            ['strTeamBadge'],
            ['strTeamBanner'],
            ['strTeamJersey'],
            ['strTeamLogo'],
            ['strKitColour1'],
            ['strKitColour2'],
            ['strKitColour3'],
            ['strTeamFanart1'],
            ['strTeamFanart2'],
            ['strTeamFanart3'],
            ['strTeamFanart4'],
        ];
    }

    /**
     * @dataProvider provideBcProperties
     */
    public function testBcProperties(string $bcProperty): void
    {
        BcTestUtils::checkBcProperty($this->team, $bcProperty);
    }
}
