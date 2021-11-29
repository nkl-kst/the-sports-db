<?php

use NklKst\TheSportsDb\Client\Client;
use NklKst\TheSportsDb\Client\ClientFactory;
use NklKst\TheSportsDb\Entity\Event\Livescore;
use NklKst\TheSportsDb\Util\TestUtils;
use PHPUnit\Framework\TestCase;

/**
 * Livescore V2 at https://www.thesportsdb.com/api.php.
 *
 * @coversNothing
 */
class LivescoreTest extends TestCase
{
    private Client $client;

    public function setUp(): void
    {
        $this->client = ClientFactory::create();
    }

    /**
     * Current event livescores (https://www.thesportsdb.com/api/v2/json/{PATREON_KEY}/livescore.php?).
     *
     * @throws Exception
     */
    public function testNow(): void
    {
        TestUtils::setPatreonKey($this->client);
        $livescores = $this->client->livescore()->now();

        $this->assertContainsOnlyInstancesOf(Livescore::class, $livescores);
    }

    /**
     * Current event livescores by league ID
     * (https://www.thesportsdb.com/api/v2/json/{PATREON_KEY}/livescore.php?l=4399).
     *
     * @throws Exception
     */
    public function testNowLeagueID(): void
    {
        TestUtils::setPatreonKey($this->client);
        $livescores = $this->client->livescore()->now(null, 4399);

        $this->assertContainsOnlyInstancesOf(Livescore::class, $livescores);
        foreach ($livescores as $livescore) {
            $this->assertSame(4399, $livescore->idLeague);
        }
    }

    /**
     * Current event livescores by sport (https://www.thesportsdb.com/api/v2/json/{PATERON_KEY}/livescore.php?s=Soccer).
     *
     * @throws Exception
     */
    public function testNowSport(): void
    {
        TestUtils::setPatreonKey($this->client);
        $livescores = $this->client->livescore()->now('Soccer');

        $this->assertContainsOnlyInstancesOf(Livescore::class, $livescores);
        foreach ($livescores as $livescore) {
            $this->assertSame('Soccer', $livescore->strSport);
        }
    }

    /**
     * Endpoint for current livescores returns null instead of an empty array, test if this is handled correctly.
     *
     * @throws Exception
     */
    public function testNowNoMatch(): void
    {
        TestUtils::setPatreonKey($this->client);
        $livescores = $this->client->livescore()->now('This query will never match');

        $this->assertIsArray($livescores);
        $this->assertEmpty($livescores);
    }
}
