<?php

namespace NklKst\TheSportsDb\Config;

use PHPUnit\Framework\TestCase;
use Symfony\Component\RateLimiter\LimiterInterface;

/**
 * @covers \NklKst\TheSportsDb\Config\Config
 */
class ConfigTest extends TestCase
{
    private Config $config;

    protected function setUp(): void
    {
        $this->config = new Config();
    }

    public function testGetKey(): void
    {
        $this->config->setKey('testKey');
        $this->assertSame('testKey', $this->config->getKey());
    }

    public function testSetKey(): void
    {
        $returnedConfig = $this->config->setKey('dummy');
        $this->assertSame($this->config, $returnedConfig);
    }

    public function testSetRateLimiterDefault(): void
    {
        $this->config->setRateLimiter();
        $this->assertNotNull($this->config->getRateLimiter());
    }

    public function testSetRateLimiter(): void
    {
        $testRateLimiter = $this->createMock(LimiterInterface::class);
        $this->config->setRateLimiter($testRateLimiter);
        $this->assertSame($testRateLimiter, $this->config->getRateLimiter());
    }

    public function testUnsetRateLimiter(): void
    {
        $this->config->setRateLimiter();
        $this->assertNotNull($this->config->getRateLimiter());

        $this->config->unsetRateLimiter();
        $this->assertNull($this->config->getRateLimiter());
    }
}
