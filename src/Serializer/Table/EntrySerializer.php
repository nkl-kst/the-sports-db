<?php

namespace NklKst\TheSportsDb\Serializer\Table;

use NklKst\TheSportsDb\Entity\Table\Entry;
use NklKst\TheSportsDb\Serializer\AbstractSerializer;

/**
 * @extends AbstractSerializer<Entry>
 */
class EntrySerializer extends AbstractSerializer
{
    protected function getEntityClass(): string
    {
        return Entry::class;
    }

    protected function getValidJsonRootNames(): array
    {
        return ['table'];
    }
}
