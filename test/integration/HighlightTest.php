<?php

use NklKst\TheSportsDb\Client\Client;
use NklKst\TheSportsDb\Client\ClientFactory;
use NklKst\TheSportsDb\Entity\Event\Highlight;
use NklKst\TheSportsDb\Util\TestUtils;
use PHPUnit\Framework\TestCase;

/**
 * Lists at https://www.thesportsdb.com/api.php.
 */
class HighlightTest extends TestCase
{
    private Client $client;

    public function setUp(): void
    {
        $this->client = ClientFactory::create();
    }

    /**
     * List all sports (https://www.thesportsdb.com/api/v1/json/1/all_sports.php).
     *
     * @throws Exception
     */
    public function testCurrent(): void
    {
        TestUtils::setPatreonKey($this->client);
        $highlights = $this->client->highlight()->current();

        $this->assertContainsOnlyInstancesOf(Highlight::class, $highlights);
    }
}
