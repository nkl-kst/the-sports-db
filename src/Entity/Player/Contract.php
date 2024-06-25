<?php

namespace NklKst\TheSportsDb\Entity\Player;

use NklKst\TheSportsDb\Entity\BcPropertiesTrait;

/**
 * @property string $strTeamBadge
 */
class Contract
{
    use BcPropertiesTrait;

    private const BC_PROPERTIES = [
        'strTeamBadge' => 'strBadge',
    ];

    public int $id;
    public int $idPlayer;
    public int $idTeam;
    public string $strSport;
    public string $strPlayer;
    public string $strTeam;
    public string $strBadge;
    public string $strYearStart;
    public string $strYearEnd;
    public string $strWage;
}
