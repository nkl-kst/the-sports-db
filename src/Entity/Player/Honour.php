<?php

namespace NklKst\TheSportsDb\Entity\Player;

class Honour
{
    public int $id;
    public int $idPlayer;
    public int $idTeam;
    public ?int $idLeague;
    public int $idHonour;
    public string $strSport;
    public string $strPlayer;
    public string $strTeam;
    public string $strTeamBadge;
    public string $strHonour;
    public string $strHonourLogo;
    public string $strHonourTrophy;
    public string $strSeason;
}
