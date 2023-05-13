<?php

namespace NklKst\TheSportsDb\Serializer;

use NklKst\TheSportsDb\Entity\Country;

/**
 * @extends AbstractSerializer<Country>
 */
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
