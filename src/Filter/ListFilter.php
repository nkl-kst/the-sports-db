<?php

namespace NklKst\TheSportsDb\Filter;

class ListFilter extends AbstractFilter
{
    public function setCountryQuery(string $query): self
    {
        return $this->addFilter('c', $query);
    }

    public function setLeagueQuery(string $query): self
    {
        return $this->addFilter('l', $query);
    }

    public function setSportQuery(string $query): self
    {
        return $this->addFilter('s', $query);
    }

    public function setUser(string $user): self
    {
        return $this->addFilter('u', $user);
    }
}
