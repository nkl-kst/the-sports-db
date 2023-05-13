<?php

namespace NklKst\TheSportsDb\Serializer\Event;

use NklKst\TheSportsDb\Entity\Event\Livescore;
use NklKst\TheSportsDb\Serializer\AbstractSerializer;

/**
 * @extends AbstractSerializer<Livescore>
 */
class LivescoreSerializer extends AbstractSerializer
{
    protected function getEntityClass(): string
    {
        return Livescore::class;
    }

    protected function getValidJsonRootNames(): array
    {
        return ['events'];
    }
}
