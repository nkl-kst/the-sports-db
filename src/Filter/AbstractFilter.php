<?php

namespace NklKst\TheSportsDb\Filter;

abstract class AbstractFilter
{
    private array $filters = [];

    protected function addFilter(string $key, string $value): self
    {
        $this->filters[$key] = $value;

        return $this;
    }

    public function setID(int $id): self
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
