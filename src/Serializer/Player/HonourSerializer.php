<?php

namespace NklKst\TheSportsDb\Serializer\Player;

use NklKst\TheSportsDb\Entity\Player\Honour;
use NklKst\TheSportsDb\Serializer\AbstractSerializer;

class HonourSerializer extends AbstractSerializer
{
    protected function getEntityClass(): string
    {
        return Honour::class;
    }

    protected function getValidJsonRootNames(): array
    {
        return ['honours', 'honors'];
    }
}
