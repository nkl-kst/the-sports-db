<?php

namespace NklKst\TheSportsDb\Entity\Player;

use NklKst\TheSportsDb\Entity\BcFieldsTrait;

/**
 * @property string $strTeamBadge
 */
class Contract
{
    use BcFieldsTrait;

    private const BC_FIELDS = [
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
