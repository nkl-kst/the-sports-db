<?php

namespace NklKst\TheSportsDb\Entity\Event;

use DateTime;

class Event
{
    public int $idEvent;
    public ?int $idSoccerXML;
    public ?int $idAPIfootball;
    public string $strEvent;
    public string $strEventAlternate;
    public string $strFilename;
    public string $strSport;
    public int $idLeague;
    public string $strLeague;
    public string $strSeason;
    public ?string $strDescriptionEN;
    public string $strHomeTeam;
    public string $strAwayTeam;
    public ?int $intHomeScore;
    public ?int $intRound;
    public ?int $intAwayScore;
    public ?int $intSpectators;
    public ?string $strOfficial;
    public ?string $strHomeGoalDetails;
    public ?string $strHomeRedCards;
    public ?string $strHomeYellowCards;
    public ?string $strHomeLineupGoalkeeper;
    public ?string $strHomeLineupDefense;
    public ?string $strHomeLineupMidfield;
    public ?string $strHomeLineupForward;
    public ?string $strHomeLineupSubstitutes;
    public ?string $strHomeFormation;
    public ?string $strAwayRedCards;
    public ?string $strAwayYellowCards;
    public ?string $strAwayGoalDetails;
    public ?string $strAwayLineupGoalkeeper;
    public ?string $strAwayLineupDefense;
    public ?string $strAwayLineupMidfield;
    public ?string $strAwayLineupForward;
    public ?string $strAwayLineupSubstitutes;
    public ?string $strAwayFormation;
    public ?int $intHomeShots;
    public ?int $intAwayShots;
    public ?string $strTimestamp;
    public DateTime $dateEvent;
    public ?DateTime $dateEventLocal;
    public ?string $strDate;
    public ?string $strTime;
    public ?string $strTimeLocal;
    public ?string $strTVStation;
    public int $idHomeTeam;
    public int $idAwayTeam;
    public ?string $strResult;
    public ?string $strVenue;
    public ?string $strCountry;
    public ?string $strCity;
    public ?string $strPoster;
    public ?string $strFanart;
    public ?string $strThumb;
    public ?string $strBanner;
    public ?string $strMap;
    public ?string $strTweet1;
    public ?string $strTweet2;
    public ?string $strTweet3;
    public ?string $strVideo;
    public ?string $strStatus;
    public ?string $strPostponed;
    public ?string $strLocked;
}
