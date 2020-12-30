<?php

namespace NklKst\TheSportsDb\Config;

use PHPUnit\Framework\TestCase;

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

    public function testGetVersion(): void
    {
        $this->config->setVersion('testVersion');
        $this->assertSame('testVersion', $this->config->getVersion());
    }

    public function testSetVersion(): void
    {
        $returnedConfig = $this->config->setVersion('dummy');
        $this->assertSame($this->config, $returnedConfig);
    }
}
