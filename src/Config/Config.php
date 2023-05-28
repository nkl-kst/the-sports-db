<?php

namespace NklKst\TheSportsDb\Config;

use NklKst\TheSportsDb\Client\Client;
use Symfony\Component\RateLimiter\LimiterInterface;
use Symfony\Component\RateLimiter\RateLimiterFactory;
use Symfony\Component\RateLimiter\Storage\InMemoryStorage;

/**
 * Configuration for a {@see Client}.
 *
 * @author Nikolai Keist (github.com/nkl-kst)
 */
class Config
{
    private ?string $key = null;

    private ?LimiterInterface $rateLimiter = null;

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

    /**
     * Get rate limiter.
     *
     * @return LimiterInterface|null Rate limiter
     */
    public function getRateLimiter(): ?LimiterInterface
    {
        return $this->rateLimiter;
    }

    /**
     * Set rate limiter. If $rateLimiter is null, then a default of 100 requests per minute is used.
     *
     * @param LimiterInterface|null $rateLimiter Rate limiter
     *
     * @return $this This configuration
     */
    public function setRateLimiter(LimiterInterface $rateLimiter = null): self
    {
        if (!$rateLimiter) {
            // Default rate limit of 100 requests per minute
            $factory = new RateLimiterFactory([
                'id' => 'rate_limiter',
                'policy' => 'sliding_window',
                'limit' => 1,
                'interval' => '1 seconds',
            ], new InMemoryStorage());

            $rateLimiter = $factory->create();
        }

        $this->rateLimiter = $rateLimiter;

        return $this;
    }

    /**
     * Unset a previous set rate limiter.
     *
     * @return $this This configuration
     */
    public function unsetRateLimiter(): self
    {
        $this->rateLimiter = null;

        return $this;
    }
}
