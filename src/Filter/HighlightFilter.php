<?php

namespace NklKst\TheSportsDb\Filter;

use DateTime;

class HighlightFilter extends AbstractFilter
{
    public function setDay(DateTime $day): self
    {
        return $this->addFilter('d', $day->format('Y-m-d'));
    }

    public function setLeague(string $leagueQuery): self
    {
        return $this->addFilter('l', $leagueQuery);
    }

    public function setSportQuery(string $sportQuery): self
    {
        return $this->addFilter('s', $sportQuery);
    }
}
