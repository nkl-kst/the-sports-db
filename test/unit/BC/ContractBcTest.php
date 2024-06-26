<?php

namespace NklKst\TheSportsDb\BC;

use Exception;
use JsonMapper;
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
     * @throws Exception
     */
    protected function setUp(): void
    {
        $contractSerializer = new ContractSerializer(new JsonMapper());
        $this->contract = $contractSerializer->serialize('{ "contracts": [{ "strBadge": "strTeamBadge" }] }')[0];
    }

    public function testContractBcFieldAccess(): void
    {
        BcTestUtils::checkBcProperty($this->contract, 'strTeamBadge');
    }
}
