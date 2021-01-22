<?php

namespace NklKst\TheSportsDb\Filter;

class LivescoreFilter extends AbstractFilter
{

    public function setLeagueID(int $leagueID): self
    {
        return $this->addFilter('l', $leagueID);
    }

    public function setSport(string $sport): self
    {
        return $this->addFilter('s', $sport);
    }
}
