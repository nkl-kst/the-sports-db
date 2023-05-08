<?php

namespace NklKst\TheSportsDb\Entity\Event;

class Lineup
{
    public int $idLineup;
    public int $idEvent;
    public ?string $strCountry;
    public ?string $strSeason;
    public string $strPosition;
    public ?string $strPositionShort;
    public string $strHome;
    public string $strSubstitute;
    public int $intSquadNumber;
    public int $idPlayer;
    public string $strPlayer;
    public int $idTeam;
    public string $strTeam;
    public ?string $strFormation;
    public ?string $strCutout;
    public ?string $strThumb;
    public ?string $strRender;
}
