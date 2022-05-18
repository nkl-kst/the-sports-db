<?php

namespace NklKst\TheSportsDb\Serializer\Player;

use NklKst\TheSportsDb\Entity\Player\Honor;

/**
 * @deprecated Use \NklKst\TheSportsDb\Serializer\Player\HonourSerializer instead
 */
class HonorSerializer extends HonourSerializer
{
    protected function getEntityClass(): string
    {
        return Honor::class;
    }
}
