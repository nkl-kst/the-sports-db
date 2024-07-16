<?php

namespace NklKst\TheSportsDb\Dependency;

use Closure;
use NklKst\TheSportsDb\Client\Client;
use NklKst\TheSportsDb\Exception\ClientInstantiationException;
use NklKst\TheSportsDb\Util\TestUtils;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * @covers \NklKst\TheSportsDb\Dependency\DependencyContainer
 */
class DependencyContainerTest extends TestCase
{
    protected function setUp(): void
    {
        // Reset container builder
        TestUtils::setHiddenStaticProperty(DependencyContainer::class, 'builder', null);
    }

    /*
     * Helper methods.
     */
    private function getBuilder(): ContainerBuilder
    {
        $containerBuilder = TestUtils::getHiddenStaticProperty(DependencyContainer::class, 'builder');
        assert($containerBuilder instanceof ContainerBuilder);

        return $containerBuilder;
    }

    private function getMethod(string $method): Closure
    {
        return TestUtils::getHiddenStaticMethod(DependencyContainer::class, $method);
    }

    /*
     * Tests.
     */
    public function testLoad(): void
    {
        $load = $this->getMethod('load');
        $load();

        $builder = $this->getBuilder();
        $this->assertNotNull($builder);
    }

    public function testCreate(): void
    {
        $create = $this->getMethod('create');
        $create();

        $this->assertEquals($this->getBuilder(), new ContainerBuilder());
    }

    public function testAutowire(): void
    {
        $create = $this->getMethod('create');
        $autowire = $this->getMethod('autowire');

        $create();
        $autowire();

        $this->assertNotEquals($this->getBuilder(), new ContainerBuilder());
    }

    public function testCompile(): void
    {
        $create = $this->getMethod('create');
        $compile = $this->getMethod('compile');

        $create();
        $compile();

        $this->assertTrue($this->getBuilder()->isCompiled());
    }

    public function testGetClient(): void
    {
        $this->assertInstanceOf(Client::class, DependencyContainer::getClient());
    }

    public function testGetClientException(): void
    {
        // Create empty builder
        $create = $this->getMethod('create');
        $create();

        $this->expectException(ClientInstantiationException::class);
        $this->assertNull(DependencyContainer::getClient());
    }
}
