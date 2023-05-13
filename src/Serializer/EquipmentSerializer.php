<?php

namespace NklKst\TheSportsDb\Serializer;

use NklKst\TheSportsDb\Entity\Equipment;

/**
 * @extends AbstractSerializer<Equipment>
 */
class EquipmentSerializer extends AbstractSerializer
{
    protected function getEntityClass(): string
    {
        return Equipment::class;
    }

    protected function getValidJsonRootNames(): array
    {
        return ['equipment'];
    }
}
