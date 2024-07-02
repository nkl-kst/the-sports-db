<?php

namespace NklKst\TheSportsDb\Entity\Table;

use DateTime;
use NklKst\TheSportsDb\Entity\BcPropertiesTrait;

/**
 * @property ?string $strTeamBadge
 */
class Standing
{
    use BcPropertiesTrait;

    private const BC_PROPERTIES = [
        'strTeamBadge' => 'strBadge',
    ];

    public int $idStanding;
    public int $intRank;
    public int $idTeam;
    public string $strTeam;
    public ?string $strBadge;
    public int $idLeague;
    public string $strLeague;
    public string $strSeason;
    public ?string $strForm;
    public ?string $strDescription;
    public int $intPlayed;
    public int $intWin;
    public int $intLoss;
    public int $intDraw;
    public int $intGoalsFor;
    public int $intGoalsAgainst;
    public int $intGoalDifference;
    public int $intPoints;
    public ?DateTime $dateUpdated;
}
