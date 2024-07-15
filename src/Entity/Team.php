<?php

namespace NklKst\TheSportsDb\Entity;

/**
 * @property ?string $strAlternate
 * @property ?string $strStadiumLocation
 * @property ?string $strTeamBadge
 * @property ?string $strTeamBanner
 * @property ?string $strTeamJersey
 * @property ?string $strTeamLogo
 * @property ?string $strKitColour1
 * @property ?string $strKitColour2
 * @property ?string $strKitColour3
 * @property ?string $strTeamFanart1
 * @property ?string $strTeamFanart2
 * @property ?string $strTeamFanart3
 * @property ?string $strTeamFanart4
 */
class Team
{
    use BcPropertiesTrait;

    private const BC_PROPERTIES = [
        'strAlternate' => 'strTeamAlternate',
        'strStadiumLocation' => 'strLocation',
        'strTeamBadge' => 'strBadge',
        'strTeamBanner' => 'strBanner',
        'strTeamJersey' => 'strKit',
        'strTeamLogo' => 'strLogo',
        'strKitColour1' => 'strColour1',
        'strKitColour2' => 'strColour2',
        'strKitColour3' => 'strColour3',
        'strTeamFanart1' => 'strFanart1',
        'strTeamFanart2' => 'strFanart2',
        'strTeamFanart3' => 'strFanart3',
        'strTeamFanart4' => 'strFanart4',
    ];

    public int $idTeam;
    public ?int $idSoccerXML;
    public ?int $idAPIfootball;
    public ?int $intLoved;
    public string $strTeam;
    public ?string $strTeamAlternate;
    public ?string $strTeamShort;
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
    public ?string $strBadge;
    public ?string $strKit;
    public ?string $strLogo;
    public ?string $strColour1;
    public ?string $strColour2;
    public ?string $strColour3;
    public ?string $strFanart1;
    public ?string $strFanart2;
    public ?string $strFanart3;
    public ?string $strFanart4;
    public ?string $strBanner;
    public ?string $strYoutube;
    public string $strLocked;
}
