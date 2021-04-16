<?php

namespace NklKst\TheSportsDb\Dependency;

use NklKst\TheSportsDb\Client\Client;
use NklKst\TheSportsDb\Util\TestUtils;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NklKst\TheSportsDb\Dependency\DependencyContainer
 */
class DependencyContainerTest extends TestCase
{
    public function testGetClient(): void
    {
        $this->assertInstanceOf(Client::class, DependencyContainer::getClient());
    }

    public function testGetClientNull(): void
    {
        // Create empty builder
        $method = TestUtils::getHiddenMethod(new DependencyContainer(), 'create');
        $method();

        $this->assertNull(DependencyContainer::getClient());
    }
}
