<?php

use NklKst\TheSportsDb\Client\Client;
use NklKst\TheSportsDb\Client\ClientFactory;
use NklKst\TheSportsDb\Entity\Event\Event;
use NklKst\TheSportsDb\Entity\Event\Television;
use NklKst\TheSportsDb\Util\TestUtils;
use PHPUnit\Framework\TestCase;

/**
 * Schedules at https://www.thesportsdb.com/api.php.
 *
 * @coversNothing
 */
class ScheduleTest extends TestCase
{
    private Client $client;

    public function setUp(): void
    {
        $this->client = ClientFactory::create();
    }

    /**
     * Next 5 events by team id (https://www.thesportsdb.com/api/v1/json/{PATERON_KEY}/eventsnext.php?id=133602).
     *
     * @throws Exception
     */
    public function testTeamNext(): void
    {
        TestUtils::setPatreonKey($this->client);

        $events = $this->client->schedule()->teamNext(133602);
        $this->assertContainsOnlyInstancesOf(Event::class, $events);

        // There are no events to check at the ending of a season
        if (empty($events)) {
            $this->markTestSkipped('No events to check');
        }

        $event = $events[0];
        $this->assertTrue('Liverpool' === $event->strHomeTeam || 'Liverpool' === $event->strAwayTeam);
    }

    /**
     * Next 15 events by league id (https://www.thesportsdb.com/api/v1/json/{PATERON_KEY}/eventsnextleague.php?id=4328).
     *
     * @throws Exception
     */
    public function testLeagueNext(): void
    {
        TestUtils::setPatreonKey($this->client);
        $events = $this->client->schedule()->leagueNext(4328);

        // There are no events to check at the ending of a season
        if (empty($events)) {
            $this->markTestSkipped('No events to check');
        }

        $this->assertContainsOnlyInstancesOf(Event::class, $events);
        $this->assertSame('English Premier League', $events[0]->strLeague);
    }

    /**
     * Last 5 events by team id (https://www.thesportsdb.com/api/v1/json/1/eventslast.php?id=133602).
     *
     * @throws Exception
     */
    public function testTeamLast(): void
    {
        $events = $this->client->schedule()->teamLast(133602);
        $this->assertContainsOnlyInstancesOf(Event::class, $events);

        // There are no events to check at the beginning of a season
        if (empty($events)) {
            $this->markTestSkipped('No events to check');
        }

        $event = $events[0];
        $this->assertTrue('Liverpool' === $event->strHomeTeam || 'Liverpool' === $event->strAwayTeam);
    }

    /**
     * Last 15 events by league id (https://www.thesportsdb.com/api/v1/json/{PATREON_KEY}/eventspastleague.php?id=4328).
     *
     * @throws Exception
     */
    public function testLeagueLast(): void
    {
        TestUtils::setPatreonKey($this->client);
        $events = $this->client->schedule()->leagueLast(4328);

        // There are no events to check at the beginning of a season
        if (empty($events)) {
            $this->markTestSkipped('No events to check');
        }

        $this->assertContainsOnlyInstancesOf(Event::class, $events);
        $this->assertSame('English Premier League', $events[0]->strLeague);
    }

    /**
     * Events in a specific round by league id/round/season
     * (https://www.thesportsdb.com/api/v1/json/1/eventsround.php?id=4328&r=38&s=2014-2015).
     *
     * @throws Exception
     */
    public function testRound(): void
    {
        $events = $this->client->schedule()->round(4328, 38, '2014-2015');
        $this->assertContainsOnlyInstancesOf(Event::class, $events);

        $event = $events[0];
        $this->assertSame('English Premier League', $event->strLeague);
        $this->assertSame(38, $event->intRound);
        $this->assertSame('2014-2015', $event->strSeason);
    }

    /**
     * Events on a specific day (https://www.thesportsdb.com/api/v1/json/{PATREON_KEY}/eventsday.php?d=2014-10-10).
     *
     * @throws Exception
     */
    public function testDay(): void
    {
        TestUtils::setPatreonKey($this->client);
        $events = $this->client->schedule()->day(new DateTime('2014-10-10'));

        $this->assertContainsOnlyInstancesOf(Event::class, $events);
        foreach ($events as $event) {
            $this->assertEquals(new DateTime('2014-10-10'), $event->dateEvent);
        }
    }

    /**
     * Events on a specific day with sport query
     * (https://www.thesportsdb.com/api/v1/json/{PATREON_KEY}/eventsday.php?d=2014-10-10&s=Soccer).
     *
     * @throws Exception
     */
    public function testDaySport(): void
    {
        TestUtils::setPatreonKey($this->client);
        $events = $this->client->schedule()->day(new DateTime('2014-10-10'), 'Soccer');

        $this->assertContainsOnlyInstancesOf(Event::class, $events);
        foreach ($events as $event) {
            $this->assertEquals(new DateTime('2014-10-10'), $event->dateEvent);
            $this->assertSame('Soccer', $event->strSport);
        }
    }

    /**
     * Events on a specific day with league query
     * (https://www.thesportsdb.com/api/v1/json/{PATREON_KEY}/eventsday.php?d=2014-10-10&l=Australian_A-League).
     *
     * @throws Exception
     */
    public function testDayLeague(): void
    {
        TestUtils::setPatreonKey($this->client);
        $events = $this->client->schedule()
            ->day(new DateTime('2014-10-10'), null, 'Australian_A-League');

        $this->assertContainsOnlyInstancesOf(Event::class, $events);
        foreach ($events as $event) {
            $this->assertEquals(new DateTime('2014-10-10'), $event->dateEvent);
            $this->assertSame('Australian A-League', $event->strLeague);
        }
    }

    /**
     * TV Events on a day by Sport/TV Station Country
     * (https://www.thesportsdb.com/api/v1/json/{PATREON_KEY}/eventstv.php?d=2018-07-07).
     *
     * @throws Exception
     */
    public function testTelevision(): void
    {
        TestUtils::setPatreonKey($this->client);
        $events = $this->client->schedule()->television(new DateTime('2018-07-07'));

        $this->assertContainsOnlyInstancesOf(Television::class, $events);
        foreach ($events as $event) {
            $this->assertEquals(new DateTime('2018-07-07'), $event->dateEvent);
        }
    }

    /**
     * TV Events on a day by Sport/TV Station Country
     * (https://www.thesportsdb.com/api/v1/json/{PATREON_KEY}/eventstv.php?d=2018-07-07&s=Fighting).
     *
     * @throws Exception
     */
    public function testTelevisionSport(): void
    {
        TestUtils::setPatreonKey($this->client);
        $events = $this->client->schedule()->television(new DateTime('2018-07-07'), 'Fighting');

        $this->assertContainsOnlyInstancesOf(Television::class, $events);
        foreach ($events as $event) {
            $this->assertEquals(new DateTime('2018-07-07'), $event->dateEvent);
            $this->assertSame('Fighting', $event->strSport);
        }
    }

    /**
     * TV Events on a day by Sport/TV Station Country
     * (https://www.thesportsdb.com/api/v1/json/{PATREON_KEY}/eventstv.php?d=2019-09-28&a=United%20Kingdom&s=Cycling).
     *
     * @throws Exception
     */
    public function testTelevisionCountry(): void
    {
        TestUtils::setPatreonKey($this->client);
        $events = $this->client->schedule()
            ->television(new DateTime('2019-09-28'), 'Cycling', 'United Kingdom');

        $this->assertContainsOnlyInstancesOf(Television::class, $events);
        foreach ($events as $event) {
            $this->assertEquals(new DateTime('2019-09-28'), $event->dateEvent);
            //$this->assertSame('Cycling', $event->strSport);
            $this->assertSame('United Kingdom', $event->strCountry);
        }
    }

    /**
     * Latest TV Events on a channel (https://www.thesportsdb.com/api/v1/json/{PATREON_KEY}/eventstv.php?c=TSN_1).
     *
     * @throws Exception
     */
    public function testTelevisionChannel(): void
    {
        TestUtils::setPatreonKey($this->client);
        $events = $this->client->schedule()->televisionChannel('TSN_1');

        $this->assertContainsOnlyInstancesOf(Television::class, $events);
        foreach ($events as $event) {
            $this->assertSame('TSN 1', $event->strChannel);
        }
    }

    /**
     * All events in specific league by season
     * (https://www.thesportsdb.com/api/v1/json/1/eventsseason.php?id=4328&s=2014-2015).
     *
     * @throws Exception
     */
    public function testSeason(): void
    {
        $events = $this->client->schedule()->season(4328, '2014-2015');
        $this->assertContainsOnlyInstancesOf(Event::class, $events);

        $event = $events[0];
        $this->assertSame('English Premier League', $event->strLeague);
        $this->assertSame('2014-2015', $event->strSeason);
    }
}
