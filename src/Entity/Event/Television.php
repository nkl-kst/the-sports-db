<?php

namespace NklKst\TheSportsDb\Entity\Event;

class Television
{
    public int $id;
    public int $idEvent;
    public string $strSport;
    public string $strEvent;
    public int $idChannel;
    public string $strCountry;
    public string $strLogo;
    public string $strChannel;
    public string $strSeason;
    public string $strTime;
    public string $dateEvent;
    public ?string $strTimeStamp;
}
