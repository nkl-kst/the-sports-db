<?php

namespace NklKst\TheSportsDb\Serializer;

use NklKst\TheSportsDb\Entity\Love;

/**
 * @extends AbstractSerializer<Love>
 */
class LoveSerializer extends AbstractSerializer
{
    protected function getEntityClass(): string
    {
        return Love::class;
    }

    protected function getValidJsonRootNames(): array
    {
        return ['players'];
    }
}
