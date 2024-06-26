<?php

namespace NklKst\TheSportsDb\BC;

use Exception;
use JsonMapper;
use NklKst\TheSportsDb\Entity\Player\FormerTeam;
use NklKst\TheSportsDb\Serializer\Player\FormerTeamSerializer;
use PHPUnit\Framework\TestCase;

/**
 * @coversNothing
 */
class FormerTeamBcTest extends TestCase
{
    private FormerTeam $formerTeam;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        $formerTeamSerializer = new FormerTeamSerializer(new JsonMapper());
        $this->formerTeam = $formerTeamSerializer->serialize('{ "formerteams": [{ "strBadge": "strTeamBadge" }] }')[0];
    }

    public function testBcProperties(): void
    {
        BcTestUtils::checkBcProperty($this->formerTeam, 'strTeamBadge');
    }
}
