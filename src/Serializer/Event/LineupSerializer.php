<?php

namespace NklKst\TheSportsDb\Serializer\Event;

use NklKst\TheSportsDb\Entity\Event\Lineup;
use NklKst\TheSportsDb\Serializer\AbstractSerializer;

class LineupSerializer extends AbstractSerializer
{
    protected function getEntityClass(): string
    {
        return Lineup::class;
    }

    protected function getValidJsonRootNames(): array
    {
        return ['lineup'];
    }
}
