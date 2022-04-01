<?php

namespace NklKst\TheSportsDb\Entity;

use DateTime;

class Equipment
{
    public int $idEquipment;
    public int $idTeam;
    public DateTime $date;
    public string $strSeason;
    public string $strEquipment;
    public string $strType;
    public string $strUsername;
}
