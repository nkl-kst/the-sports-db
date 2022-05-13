<?php

namespace NklKst\TheSportsDb\Serializer\Player;

use NklKst\TheSportsDb\Entity\Player\Honor;
use NklKst\TheSportsDb\Serializer\AbstractSerializer;

class HonorSerializer extends AbstractSerializer
{
    protected function getEntityClass(): string
    {
        return Honor::class;
    }

    protected function getValidJsonRootNames(): array
    {
        return ['honours', 'honors'];
    }
}
