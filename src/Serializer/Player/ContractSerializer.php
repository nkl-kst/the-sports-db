<?php

namespace NklKst\TheSportsDb\Serializer\Player;

use NklKst\TheSportsDb\Entity\Player\Contract;
use NklKst\TheSportsDb\Serializer\AbstractSerializer;

/**
 * @extends AbstractSerializer<Contract>
 */
class ContractSerializer extends AbstractSerializer
{
    protected function getEntityClass(): string
    {
        return Contract::class;
    }

    protected function getValidJsonRootNames(): array
    {
        return ['contracts'];
    }
}
