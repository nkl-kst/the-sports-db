<?php

namespace NklKst\TheSportsDb\Serializer\Event;

use NklKst\TheSportsDb\Entity\Event\Highlight;
use NklKst\TheSportsDb\Serializer\AbstractSerializer;

class HighlightSerializer extends AbstractSerializer
{
    protected function getEntityClass(): string
    {
        return Highlight::class;
    }

    protected function getValidJsonRootNames(): array
    {
        return ['tvhighlights'];
    }
}
