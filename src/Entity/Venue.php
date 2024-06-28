<?php

namespace NklKst\TheSportsDb\Entity;

class Venue
{
    public int $idVenue;
    public ?int $idDupe;
    public string $strVenue;
    public ?string $strVenueAlternate;
    public ?string $strSport;
    public ?string $strDescriptionEN;
    public ?int $intCapacity;
    public ?string $strCost;
    public ?string $strCountry;
    public ?string $strLocation;
    public int $intFormedYear;
    public ?string $strFanart1;
    public ?string $strFanart2;
    public ?string $strFanart3;
    public ?string $strFanart4;
    public ?string $strThumb;
    public ?string $strLogo;
    public ?string $strMap;
    public ?string $strWebsite;
    public ?string $strFacebook;
    public ?string $strInstagram;
    public ?string $strTwitter;
    public ?string $strYoutube;
    public string $strLocked;
}
