<?php

namespace NklKst\TheSportsDb\Filter;

use DateTime;

class ScheduleFilter extends AbstractFilter
{
    public function setChannel(string $channel): self
    {
        return $this->addFilter('c', $channel);
    }

    public function setCountryQuery(string $countryQuery): self
    {
        return $this->addFilter('a', $countryQuery);
    }

    public function setDay(DateTime $day): self
    {
        return $this->addFilter('d', $day->format('Y-m-d'));
    }

    public function setLeagueQuery(string $leagueQuery): self
    {
        return $this->addFilter('l', $leagueQuery);
    }

    public function setRound(int $round): self
    {
        return $this->addFilter('r', $round);
    }

    public function setSeason(string $season): self
    {
        return $this->addFilter('s', $season);
    }

    public function setSportQuery(string $sportQuery): self
    {
        return $this->addFilter('s', $sportQuery);
    }
}
