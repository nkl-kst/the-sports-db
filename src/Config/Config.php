<?php

namespace NklKst\TheSportsDb\Config;

use NklKst\TheSportsDb\Client\Client;

/**
 * Configuration for a {@see Client}.
 *
 * @author Nikolai Keist (github.com/nkl-kst)
 */
class Config
{
    private ?string $key = null;

    /**
     * Get Patreon key.
     *
     * @return string|null Patreon key
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * Set Patreon key.
     *
     * @param string $key Patreon key
     *
     * @return $this This configuration
     */
    public function setKey(string $key): self
    {
        $this->key = $key;

        return $this;
    }
}
