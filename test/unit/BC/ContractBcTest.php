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

        // TODO: How to check if PHP Deprecated has been raised (https://github.com/sebastianbergmann/phpunit/issues/5062#issuecomment-1420379762)?

        $docComment = (new \ReflectionClass(Contract::class))->getDocComment();
        self::assertMatchesRegularExpression('/@property .* \$strTeamBadge/', $docComment);
    }
}
