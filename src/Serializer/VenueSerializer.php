<?php

namespace NklKst\TheSportsDb\Serializer;

use NklKst\TheSportsDb\Entity\Venue;

/**
 * @extends AbstractSerializer<Venue>
 */
class VenueSerializer extends AbstractSerializer
{
    protected function getEntityClass(): string
    {
        return Venue::class;
    }

    protected function getValidJsonRootNames(): array
    {
        return ['venues'];
    }
}
