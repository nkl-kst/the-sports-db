<?php

namespace NklKst\TheSportsDb\Filter;

abstract class AbstractFilter
{
    private array $filters = [];

    /**
     * @return $this
     */
    protected function addFilter(string $key, string $value)
    {
        $this->filters[$key] = $value;

        return $this;
    }

    /**
     * @return $this
     */
    public function setID(int $id)
    {
        return $this->addFilter('id', $id);
    }

    public function getQuery(): string
    {
        $query = '';
        foreach ($this->filters as $key => $value) {
            $query .= $key.'='.$value.'&';
        }

        return $query;
    }
}
