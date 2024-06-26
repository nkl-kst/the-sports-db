<?php

namespace NklKst\TheSportsDb\Client;

use PHPUnit\Framework\TestCase;

/**
 * @covers \NklKst\TheSportsDb\Client\ClientFactory
 */
class ClientFactoryTest extends TestCase
{
    /**
     * @runInSeparateProcess
     */
    public function testCreate(): void
    {
        $this->assertInstanceOf(Client::class, ClientFactory::create());
    }
}
