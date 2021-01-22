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
     * Latest Event Youtube Highlights (https://www.thesportsdb.com/api/v1/json/{PATERON_KEY}/eventshighlights.php).
     *
     * @throws Exception
     */
    public function testLatest(): void
    {
        TestUtils::setPatreonKey($this->client);
        $highlights = $this->client->highlight()->latest();

        $this->assertContainsOnlyInstancesOf(Highlight::class, $highlights);
    }
}
