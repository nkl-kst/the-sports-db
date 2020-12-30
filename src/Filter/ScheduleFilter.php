<?php

namespace NklKst\TheSportsDb\Filter;

class ScheduleFilter extends AbstractFilter
{
    public function setRound(int $round): self
    {
        return $this->addFilter('r', $round);
    }

    public function setSeason(string $season): self
    {
        return $this->addFilter('s', $season);
    }
}
