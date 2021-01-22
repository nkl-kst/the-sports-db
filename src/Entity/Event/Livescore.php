<?php

namespace NklKst\TheSportsDb\Entity\Event;

use DateTime;

class Livescore
{
    public int $idLiveScore;
    public int $idEvent;
    public string $strSport;
    public int $idLeague;
    public string $strLeague;
    public int $idHomeTeam;
    public int $idAwayTeam;
    public string $strHomeTeam;
    public string $strAwayTeam;
    public string $strHomeTeamBadge;
    public string $strAwayTeamBadge;
    public int $intHomeScore;
    public int $intAwayScore;
    public ?string $strPlayer;
    public ?int $idPlayer;
    public ?int $intEventScore;
    public ?int $intEventScoreTotal;
    public string $strProgress;
    public string $strEventTime;
    public DateTime $dateEvent;
    public DateTime $updated;
}
