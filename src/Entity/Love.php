<?php

namespace NklKst\TheSportsDb\Entity;

use DateTime;

class Love
{
    public int $idEdit;
    public string $strUsername;
    public string $strEditType;
    public ?string $strReason;
    public DateTime $date;
    public ?int $idTeam;
    public ?int $idPlayer;
    public ?int $idLeague;
    public ?int $idEvent;
    public ?string $strSport;
    public ?string $strTeam;
    public ?string $strPlayer;
    public ?string $strLeague;
    public ?string $strEvent;
    public ?string $strEventPoster;
    public ?string $strEventSquare;
    public ?string $strPlayerThumb;
    public ?string $strTeamBadge;
}
