<?php

namespace NklKst\TheSportsDb\Entity;

use DateTime;

class League
{
    public int $idLeague;
    public ?int $idSoccerXML;
    public ?int $idAPIfootball;
    public string $strSport;
    public string $strLeague;
    public ?string $strLeagueAlternate;
    public string $strDivision;
    public int $idCup;
    public string $strCurrentSeason;
    public int $intFormedYear;
    public ?DateTime $dateFirstEvent;
    public string $strGender;
    public string $strCountry;
    public string $strWebsite;
    public string $strFacebook;
    public string $strTwitter;
    public string $strYoutube;
    public string $strRSS;
    public string $strDescriptionEN;
    public ?string $strDescriptionDE;
    public ?string $strDescriptionFR;
    public ?string $strDescriptionIT;
    public ?string $strDescriptionCN;
    public ?string $strDescriptionJP;
    public ?string $strDescriptionRU;
    public ?string $strDescriptionES;
    public ?string $strDescriptionPT;
    public ?string $strDescriptionSE;
    public ?string $strDescriptionNL;
    public ?string $strDescriptionHU;
    public ?string $strDescriptionNO;
    public ?string $strDescriptionPL;
    public ?string $strDescriptionIL;
    public ?string $strFanart1;
    public ?string $strFanart2;
    public ?string $strFanart3;
    public ?string $strFanart4;
    public ?string $strBanner;
    public ?string $strBadge;
    public ?string $strLogo;
    public ?string $strPoster;
    public ?string $strTrophy;
    public string $strNaming;
    public ?string $strComplete;
    public string $strLocked; // "unlocked"
}
