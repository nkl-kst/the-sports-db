<?php

namespace NklKst\TheSportsDb\Serializer\Event;

use NklKst\TheSportsDb\Entity\Event\Statistic;
use NklKst\TheSportsDb\Serializer\AbstractSerializer;

class StatisticSerializer extends AbstractSerializer
{
    protected function getEntityClass(): string
    {
        return Statistic::class;
    }

    protected function getValidJsonRootNames(): array
    {
        return ['eventstats'];
    }
}
