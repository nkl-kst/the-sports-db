<?php

namespace NklKst\TheSportsDb\Serializer;

use NklKst\TheSportsDb\Entity\Country;

class CountrySerializer extends AbstractSerializer
{
    protected function getEntityClass(): string
    {
        return Country::class;
    }

    protected function getValidJsonRootNames(): array
    {
        return ['countries'];
    }
}
