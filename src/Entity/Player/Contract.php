<?php

namespace NklKst\TheSportsDb\Entity\Player;

class Contract
{
    public int $id;
    public int $idPlayer;
    public int $idTeam;
    public string $strSport;
    public string $strPlayer;
    public string $strTeam;
    public string $strTeamBadge;
    public string $strYearStart;
    public string $strYearEnd;
    public string $strWage;
}
