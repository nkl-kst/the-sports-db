<?php

namespace NklKst\TheSportsDb\Serializer\Event;

use NklKst\TheSportsDb\Entity\Event\Timeline;
use NklKst\TheSportsDb\Serializer\AbstractSerializer;

class TimelineSerializer extends AbstractSerializer
{
    protected function getEntityClass(): string
    {
        return Timeline::class;
    }

    protected function getValidJsonRootNames(): array
    {
        return ['timeline'];
    }
}
