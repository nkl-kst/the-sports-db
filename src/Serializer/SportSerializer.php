<?php

namespace NklKst\TheSportsDb\Serializer;

use NklKst\TheSportsDb\Entity\Sport;

class SportSerializer extends AbstractSerializer
{
    protected function getEntityClass(): string
    {
        return Sport::class;
    }

    protected function getValidJsonRootNames(): array
    {
        return ['sports'];
    }
}
