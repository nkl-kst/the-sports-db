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
    public ?int $idVenue;
    public ?int $idChannel;
    public ?string $strTeam;
    public ?string $strPlayer;
    public ?string $strLeague;
    public ?string $strEvent;
    public ?string $strVenue;
    public ?string $strSport;
    public ?string $strEventThumb;
    public ?string $strEventPoster;
    public ?string $strEventSquare;
    public ?string $strEventBanner;
    public ?string $strEventFanart;
    public ?string $strEventMap;
    public ?string $strPlayerThumb;
    public ?string $strPlayerCutout;
    public ?string $strPlayerRender;
    public ?string $strPlayerFanart;
    public ?string $strPlayerBanner;
    public ?string $strPlayerPoster;
    public ?string $strTeamBadge;
    public ?string $strTeamLogo;
    public ?string $strTeamKit;
    public ?string $strTeamFanart;
    public ?string $strTeamBanner;
    public ?string $strTeamEquipment;
    public ?string $strVenueThumb;
    public ?string $strVenueLogo;
    public ?string $strVenueFanart;
    public ?string $strLeagueBadge;
    public ?string $strLeagueLogo;
    public ?string $strLeagueFanart;
    public ?string $strLeagueBanner;
    public ?string $strLeaguePoster;
    public ?string $strLeagueTrophy;
    public ?string $strChannelLogo;
    public ?string $strChannelBanner;
    public ?string $strChannelFanart;
}
