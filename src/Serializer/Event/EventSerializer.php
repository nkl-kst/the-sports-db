<?php

namespace NklKst\TheSportsDb\Serializer\Event;

use NklKst\TheSportsDb\Entity\Event\Event;
use NklKst\TheSportsDb\Serializer\AbstractSerializer;

/**
 * @extends AbstractSerializer<Event>
 */
class EventSerializer extends AbstractSerializer
{
    protected function getEntityClass(): string
    {
        return Event::class;
    }

    protected function getValidJsonRootNames(): array
    {
        return ['event', 'events', 'results'];
    }
}
