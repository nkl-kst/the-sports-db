<?php

namespace NklKst\TheSportsDb\Entity;

class Team
{
    public int $idTeam;
    public ?int $idSoccerXML;
    public ?int $idAPIfootball;
    public ?int $intLoved;
    public string $strTeam;
    public ?string $strTeamShort;
    public ?string $strAlternate;
    public ?int $intFormedYear;
    public string $strSport;
    public string $strLeague;
    public int $idLeague;
    public ?string $strLeague2;
    public ?int $idLeague2;
    public ?string $strLeague3;
    public ?int $idLeague3;
    public ?string $strLeague4;
    public ?int $idLeague4;
    public ?string $strLeague5;
    public ?int $idLeague5;
    public ?string $strLeague6;
    public ?int $idLeague6;
    public ?string $strLeague7;
    public ?int $idLeague7;
    public ?string $strDivision;
    public ?int $idVenue;
    public ?string $strManager;
    public ?string $strStadium;
    public ?string $strKeywords;
    public ?string $strRSS;
    public ?string $strStadiumThumb;
    public ?string $strStadiumDescription;
    public ?string $strStadiumLocation; // TODO: BC
    public ?string $strLocation;
    public ?int $intStadiumCapacity;
    public ?string $strWebsite;
    public ?string $strFacebook;
    public ?string $strTwitter;
    public ?string $strInstagram;
    public ?string $strDescriptionEN;
    public ?string $strDescriptionDE;
    public ?string $strDescriptionFR;
    public ?string $strDescriptionCN;
    public ?string $strDescriptionIT;
    public ?string $strDescriptionJP;
    public ?string $strDescriptionRU;
    public ?string $strDescriptionES;
    public ?string $strDescriptionPT;
    public ?string $strDescriptionSE;
    public ?string $strDescriptionNL;
    public ?string $strDescriptionHU;
    public ?string $strDescriptionNO;
    public ?string $strDescriptionIL;
    public ?string $strDescriptionPL;
    public string $strGender;
    public string $strCountry;
    public ?string $strTeamBadge; // TODO: BC
    public ?string $strBadge;
    public ?string $strTeamJersey; // TODO: BC
    public ?string $strKit;
    public ?string $strTeamLogo; // TODO: BC
    public ?string $strLogo;
    public ?string $strKitColour1;
    public ?string $strKitColour2;
    public ?string $strKitColour3;
    public ?string $strTeamFanart1; // TODO: BC
    public ?string $strTeamFanart2; // TODO: BC
    public ?string $strTeamFanart3; // TODO: BC
    public ?string $strTeamFanart4; // TODO: BC
    public ?string $strFanart1;
    public ?string $strFanart2;
    public ?string $strFanart3;
    public ?string $strFanart4;
    public ?string $strTeamBanner; // TODO: BC
    public ?string $strBanner;
    public ?string $strYoutube;
    public string $strLocked;
}
