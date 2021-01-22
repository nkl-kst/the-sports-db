<?php

use NklKst\TheSportsDb\Client\Client;
use NklKst\TheSportsDb\Client\ClientFactory;
use NklKst\TheSportsDb\Entity\Event\Highlight;
use NklKst\TheSportsDb\Util\TestUtils;
use PHPUnit\Framework\TestCase;

/**
 * Highlights at https://www.thesportsdb.com/api.php.
 */
class HighlightTest extends TestCase
{
    private Client $client;

    public function setUp(): void
    {
        $this->client = ClientFactory::create();
    }

    /**
     * Latest Event Youtube Highlights (https://www.thesportsdb.com/api/v1/json/{PATREON_KEY}/eventshighlights.php).
     *
     * @throws Exception
     */
    public function testLatest(): void
    {
        TestUtils::setPatreonKey($this->client);
        $highlights = $this->client->highlight()->latest();

        $this->assertContainsOnlyInstancesOf(Highlight::class, $highlights);
    }

    /**
     * Latest Event Youtube Highlights by day
     * (https://www.thesportsdb.com/api/v1/json/{PATREON_KEY}/eventshighlights.php?d=2019-10-13).
     *
     * @throws Exception
     */
    public function testLatestDay(): void
    {
        TestUtils::setPatreonKey($this->client);
        $highlights = $this->client->highlight()->latest(new DateTime('2019-10-13'));

        $this->assertContainsOnlyInstancesOf(Highlight::class, $highlights);
        foreach ($highlights as $highlight) {
            $this->assertEquals(new DateTime('2019-10-13'), $highlight->dateEvent);
        }
    }

    /**
     * Latest Event Youtube Highlights by day and league
     * (https://www.thesportsdb.com/api/v1/json/{PATREON_KEY}/eventshighlights.php?d=2019-10-12&l=WTA%20Tour).
     *
     * @throws Exception
     */
    public function testLatestDayLeague(): void
    {
        TestUtils::setPatreonKey($this->client);
        $highlights = $this->client->highlight()->latest(new DateTime('2019-10-12'), 'WTA Tour');

        $this->assertContainsOnlyInstancesOf(Highlight::class, $highlights);
        foreach ($highlights as $highlight) {
            $this->assertEquals(new DateTime('2019-10-12'), $highlight->dateEvent);
            $this->assertSame('WTA Tour', $highlight->strLeague);
        }
    }

    /**
     * Latest Event Youtube Highlights by league
     * (https://www.thesportsdb.com/api/v1/json/{PATREON_KEY}/eventshighlights.php?l=MLB).
     *
     * @throws Exception
     */
    public function testLatestLeague(): void
    {
        TestUtils::setPatreonKey($this->client);
        $highlights = $this->client->highlight()->latest(null, 'MLB');

        $this->assertContainsOnlyInstancesOf(Highlight::class, $highlights);
        foreach ($highlights as $highlight) {
            $this->assertSame('MLB', $highlight->strLeague);
        }
    }

    /**
     * Latest Event Youtube Highlights by sport query
     * (https://www.thesportsdb.com/api/v1/json/{PATREON_KEY}/eventshighlights.php?s=Soccer).
     *
     * @throws Exception
     */
    public function testLatestSportQuery(): void
    {
        TestUtils::setPatreonKey($this->client);
        $highlights = $this->client->highlight()->latest(null, null, 'Soccer');

        $this->assertContainsOnlyInstancesOf(Highlight::class, $highlights);
        foreach ($highlights as $highlight) {
            $this->assertSame('Soccer', $highlight->strSport);
        }
    }

    /**
     * Latest Event Youtube Highlights by day and sport query
     * (https://www.thesportsdb.com/api/v1/json/{PATREON_KEY}/eventshighlights.php?s=Soccer&d=2020-02-15).
     *
     * @throws Exception
     */
    public function testLatestDaySportQuery(): void
    {
        TestUtils::setPatreonKey($this->client);
        $highlights = $this->client->highlight()->latest(new DateTime('2020-02-15'), null, 'Soccer');

        $this->assertContainsOnlyInstancesOf(Highlight::class, $highlights);
        foreach ($highlights as $highlight) {
            $this->assertEquals(new DateTime('2020-02-15'), $highlight->dateEvent);
            $this->assertSame('Soccer', $highlight->strSport);
        }
    }
}
