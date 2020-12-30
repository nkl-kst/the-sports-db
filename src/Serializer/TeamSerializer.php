<?php

namespace NklKst\TheSportsDb\Serializer;

use NklKst\TheSportsDb\Entity\Team;

class TeamSerializer extends AbstractSerializer
{
    protected function getEntityClass(): string
    {
        return Team::class;
    }

    protected function getValidJsonRootNames(): array
    {
        return ['teams'];
    }
}
