<?php

namespace NklKst\TheSportsDb\Entity\Player;

use NklKst\TheSportsDb\Entity\BcPropertiesTrait;

/**
 * @property string $strTeamBadge
 */
class FormerTeam
{
    use BcPropertiesTrait;

    private const BC_PROPERTIES = [
        'strTeamBadge' => 'strBadge',
    ];

    public int $id;
    public int $idPlayer;
    public int $idFormerTeam;
    public string $strSport;
    public string $strPlayer;
    public string $strFormerTeam;
    public string $strMoveType;
    public string $strBadge;
    public string $strJoined;
    public string $strDeparted;
}
