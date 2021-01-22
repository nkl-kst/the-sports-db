<?php

namespace NklKst\TheSportsDb\Entity\Event;

use DateTime;

class Highlight
{
    public int $idEvent;
    public string $strEvent;
    public string $strSport;
    public int $idLeague;
    public string $strLeague;
    public DateTime $dateEvent;
    public string $strVideo;
    public ?string $strPoster;
    public ?string $strThumb;
    public ?string $strFanart;
    public string $strSeason;
}
