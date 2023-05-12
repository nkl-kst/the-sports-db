<?php

namespace NklKst\TheSportsDb\Serializer\Event;

use NklKst\TheSportsDb\Entity\Event\Result;
use NklKst\TheSportsDb\Serializer\AbstractSerializer;

/**
 * @extends AbstractSerializer<Result>
 */
class ResultSerializer extends AbstractSerializer
{
    protected function getEntityClass(): string
    {
        return Result::class;
    }

    protected function getValidJsonRootNames(): array
    {
        return ['results'];
    }
}
