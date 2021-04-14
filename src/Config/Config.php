<?php

namespace NklKst\TheSportsDb\Config;

class Config
{
    private ?string $key = null;

    public function getKey(): ?string
    {
        return $this->key;
    }

    public function setKey(string $key): self
    {
        $this->key = $key;

        return $this;
    }
}
