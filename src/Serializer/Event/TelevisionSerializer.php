<?php

namespace NklKst\TheSportsDb\Serializer\Event;

use NklKst\TheSportsDb\Entity\Event\Television;
use NklKst\TheSportsDb\Serializer\AbstractSerializer;

class TelevisionSerializer extends AbstractSerializer
{
    protected function getEntityClass(): string
    {
        return Television::class;
    }

    protected function getValidJsonRootNames(): array
    {
        return ['tvevent', 'tvevents'];
    }
}
