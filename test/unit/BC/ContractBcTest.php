<?php

namespace NklKst\TheSportsDb\BC;

use NklKst\TheSportsDb\Entity\Player\Contract;
use NklKst\TheSportsDb\Serializer\Player\ContractSerializer;
use PHPUnit\Framework\TestCase;

/**
 * @coversNothing
 */
class ContractBcTest extends TestCase
{
    private Contract $contract;

    /**
     * @throws \Exception
     */
    protected function setUp(): void
    {
        $contractSerializer = new ContractSerializer(new \JsonMapper());
        $this->contract     = $contractSerializer->serialize('{ "contracts": [{ "strBadge": "BC value" }] }')[0];
    }

    public function testContractBcFieldAccess(): void
    {
        self::assertEquals('BC value', $this->contract->strTeamBadge);

        // TODO: Expect deprecation
        // TODO: Check docBlock annotation
    }
}
