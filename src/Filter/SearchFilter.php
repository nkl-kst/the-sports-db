<?php

namespace NklKst\TheSportsDb\Filter;

class SearchFilter extends AbstractFilter
{
    public function setEventQuery(string $eventQuery): self
    {
        return $this->addFilter('e', $eventQuery);
    }

    public function setPlayerQuery(string $playerQuery): self
    {
        return $this->addFilter('p', $playerQuery);
    }

    public function setSeason(string $season): self
    {
        return $this->addFilter('s', $season);
    }

    public function setTeamQuery(string $teamQuery): self
    {
        return $this->addFilter('t', $teamQuery);
    }

    public function setTeamShortQuery(string $teamShortQuery): self
    {
        return $this->addFilter('sname', $teamShortQuery);
    }

    public function setVenueQuery(string $venueQuery): self
    {
        return $this->addFilter('t', $venueQuery);
    }
}
