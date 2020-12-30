<?php

namespace NklKst\TheSportsDb\Serializer\Player;

use NklKst\TheSportsDb\Entity\Player\FormerTeam;
use NklKst\TheSportsDb\Serializer\AbstractSerializer;

class FormerTeamSerializer extends AbstractSerializer
{
    protected function getEntityClass(): string
    {
        return FormerTeam::class;
    }

    protected function getValidJsonRootNames(): array
    {
        return ['formerteams'];
    }
}
