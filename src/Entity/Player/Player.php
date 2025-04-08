<?php

namespace NklKst\TheSportsDb\Entity\Player;

use DateTime;

class Player
{
    public int $idPlayer;
    public int $idTeam;
    public ?int $idTeam2;
    public ?int $idTeamNational;
    public ?int $idSoccerXML;
    public ?int $idAPIfootball;
    public ?int $idPlayerManager;
    public ?int $idWikidata;
    public ?int $idTransferMkt;
    public ?int $idESPN;
    public string $strNationality;
    public string $strPlayer;
    public ?string $strPlayerAlternate;
    public string $strTeam;
    public ?string $strTeam2;
    public string $strSport;
    public ?int $intSoccerXMLTeamID;
    public DateTime $dateBorn;
    public ?DateTime $dateDied;
    public ?string $strNumber;
    public ?DateTime $dateSigned;
    public ?string $strSigning;
    public ?string $strWage;
    public ?string $strOutfitter;
    public ?string $strKit;
    public ?string $strAgent;
    public ?string $strBirthLocation;
    public ?string $strEthnicity;
    public ?string $strStatus;
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
    public ?string $strSide;
    public string $strPosition;
    public ?string $strCollege;
    public ?string $strWebsite;
    public ?string $strFacebook;
    public ?string $strTwitter;
    public ?string $strInstagram;
    public ?string $strYoutube;
    public ?string $strHeight;
    public ?string $strWeight;
    public ?int $intLoved;
    public ?string $strThumb;
    public ?string $strPoster;
    public ?string $strCutout;
    public ?string $strRender;
    public ?string $strBanner;
    public ?string $strFanart1;
    public ?string $strFanart2;
    public ?string $strFanart3;
    public ?string $strFanart4;
    public ?string $strCreativeCommons;
    public ?string $strLocked;
}
