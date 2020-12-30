<?php

namespace NklKst\TheSportsDb\Entity\Event;

use DateTime;

class Result
{
    public int $idResult;
    public ?int $idPlayer;
    public ?string $strPlayer;
    public int $idTeam;
    public int $idEvent;
    public string $strEvent;
    public ?string $strResult;
    public int $intPosition;
    public int $intPoints;
    public string $strDetail;
    public DateTime $dateEvent;
    public string $strSeason;
    public string $strCountry;
    public string $strSport;
}
