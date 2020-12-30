<?php

namespace NklKst\TheSportsDb\Filter;

class LookupFilter extends AbstractFilter
{
    public function setLeagueID(int $id): self
    {
        return $this->addFilter('l', $id);
    }

    public function setSeason(string $query): self
    {
        return $this->addFilter('s', $query);
    }
}
