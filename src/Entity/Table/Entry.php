<?php

namespace NklKst\TheSportsDb\Entity\Table;

class Entry
{
    public string $name;
    public int $teamid;
    public int $played;
    public int $goalsfor;
    public int $goalsagainst;
    public int $goalsdifference;
    public int $win;
    public int $draw;
    public int $lost;
    public int $total;
}
