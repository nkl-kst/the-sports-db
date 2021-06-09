<?php

namespace NklKst\TheSportsDb\Entity\Table;

use DateTime;

class Standing
{
    public int $idStanding;
    public int $intRank;
    public int $idTeam;
    public string $strTeam;
    public ?string $strTeamBadge;
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
