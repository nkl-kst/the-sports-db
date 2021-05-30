<?php

namespace NklKst\TheSportsDb\Serializer;

use NklKst\TheSportsDb\Entity\League;

class LeagueSerializer extends AbstractSerializer
{
    protected function getEntityClass(): string
    {
        return League::class;
    }

    protected function getValidJsonRootNames(): array
    {
        return ['countrys', 'leagues'];
    }

    protected function endpointReturnsNull(): bool
    {
        return true;
    }
}
