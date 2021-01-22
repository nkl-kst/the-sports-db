<?php

namespace NklKst\TheSportsDb\Config;

class Config
{
    private ?string $key = null;
    private ?string $version = null;

    public function getKey(): ?string
    {
        return $this->key;
    }

    public function setKey(string $key): self
    {
        $this->key = $key;

        return $this;
    }

    /**
     * @deprecated
     */
    public function getVersion(): ?string
    {
        return $this->version;
    }

    /**
     * @deprecated
     */
    public function setVersion(string $version): self
    {
        $this->version = $version;

        return $this;
    }
}
