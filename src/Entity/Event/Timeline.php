<?php

namespace NklKst\TheSportsDb\Entity\Event;

use DateTime;

class Timeline
{
    public int $idTimeline;
    public int $idEvent;
    public string $strTimeline;
    public string $strTimelineDetail;
    public string $strHome;
    public string $strEvent;
    public ?int $idAPIfootball;
    public int $idPlayer;
    public string $strPlayer;
    public ?int $idAssist;
    public ?string $strAssist;
    public int $intTime;
    public ?string $strPeriod;
    public int $idTeam;
    public string $strTeam;
    public ?string $strComment;
    public DateTime $dateEvent;
    public ?string $strCountry;
    public string $strSeason;
}
