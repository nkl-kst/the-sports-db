<?php

namespace NklKst\TheSportsDb\Entity\Event;

class Lineup
{
    public int $idLineup;
    public int $idEvent;
    public string $strEvent;
    public string $strPosition;
    public ?string $strPositionShort;
    public string $strHome;
    public string $strSubstitute;
    public int $intSquadNumber;
    public int $idPlayer;
    public string $strPlayer;
    public int $idTeam;
    public int $strTeam;
}
