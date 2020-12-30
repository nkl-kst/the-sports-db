<?php

namespace NklKst\TheSportsDb\Entity\Player;

class FormerTeam
{
    public int $id;
    public int $idPlayer;
    public int $idFormerTeam;
    public string $strSport;
    public string $strPlayer;
    public string $strFormerTeam;
    public string $strMoveType;
    public string $strTeamBadge;
    public string $strJoined;
    public string $strDeparted;
}
