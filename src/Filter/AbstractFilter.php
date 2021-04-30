<?php

namespace NklKst\TheSportsDb\Filter;

abstract class AbstractFilter
{
    private array $filters = [];

    /**
     * @param string     $key   Filter key
     * @param int|string $value Filter value
     *
     * @return $this
     */
    protected function addFilter(string $key, $value)
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
