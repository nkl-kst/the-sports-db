<?php

namespace NklKst\TheSportsDb\Entity\Player;

class Honour
{
    public int $id;
    public int $idPlayer;
    public int $idTeam;
    public ?int $idLeague;
    public string $strSport;
    public string $strPlayer;
    public string $strTeam;
    public string $strHonour;
    public string $strSeason;
}
