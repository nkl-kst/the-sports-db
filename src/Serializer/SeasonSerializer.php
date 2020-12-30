<?php

namespace NklKst\TheSportsDb\Serializer;

use NklKst\TheSportsDb\Entity\Season;

class SeasonSerializer extends AbstractSerializer
{
    protected function getEntityClass(): string
    {
        return Season::class;
    }

    protected function getValidJsonRootNames(): array
    {
        return ['seasons'];
    }
}
