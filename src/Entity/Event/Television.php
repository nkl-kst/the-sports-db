<?php

namespace NklKst\TheSportsDb\Entity\Event;

use DateTime;

class Television
{
    public int $id;
    public int $idEvent;
    public string $strSport;
    public string $strEvent;
    public ?string $strEventThumb;
    public ?string $strEventPoster;
    public ?string $strEventBanner;
    public ?string $strEventSquare;
    public int $idChannel;
    public string $strCountry;
    public string $strLogo;
    public string $strChannel;
    public string $strSeason;
    public ?int $intDivision;
    public string $strTime;
    public DateTime $dateEvent;
    public ?string $strTimeStamp;
}
