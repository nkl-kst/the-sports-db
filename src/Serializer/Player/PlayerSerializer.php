<?php

namespace NklKst\TheSportsDb\Serializer\Player;

use NklKst\TheSportsDb\Entity\Player\Player;
use NklKst\TheSportsDb\Serializer\AbstractSerializer;

class PlayerSerializer extends AbstractSerializer
{
    protected function getEntityClass(): string
    {
        return Player::class;
    }

    protected function getValidJsonRootNames(): array
    {
        return ['player', 'players'];
    }
}
