<?php

namespace NklKst\TheSportsDb\BC;

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
     * @throws \Exception
     */
    protected function setUp(): void
    {
        $teamSerializer = new TeamSerializer(new \JsonMapper());
        $this->team     = $teamSerializer->serialize('{ "teams": [{ "strLocation": "strStadiumLocation" }] }')[0];
    }

    public function testContractBcFieldAccess(): void
    {
        BcTestUtils::checkBcProperty($this->team, 'strStadiumLocation');
    }
}
