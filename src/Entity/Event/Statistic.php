<?php

namespace NklKst\TheSportsDb\Entity\Event;

class Statistic
{
    public int $idStatistic;
    public int $idEvent;
    public int $idApiFootball;
    public string $strEvent;
    public string $strStat;
    public int $intHome;
    public int $intAway;
}
