<?php

use NklKst\TheSportsDb\Client\Client;
use NklKst\TheSportsDb\Client\ClientFactory;
use NklKst\TheSportsDb\Entity\Event\Event;
use NklKst\TheSportsDb\Util\TestUtils;
use PHPUnit\Framework\TestCase;

/**
 * Schedules at https://www.thesportsdb.com/api.php.
 */
class ScheduleTest extends TestCase
{
    private Client $client;

    public function setUp(): void
    {
        $this->client = ClientFactory::create();
    }

    /**
     * Next 5 events by team id (https://www.thesportsdb.com/api/v1/json/1/eventsnext.php?id=133602).
     *
     * @throws Exception
     */
    public function testTeamNext(): void
    {
        $events = $this->client->schedule()->teamNext(133602);
        $this->assertContainsOnlyInstancesOf(Event::class, $events);

        $event = $events[0];
        $this->assertTrue('Liverpool' === $event->strHomeTeam || 'Liverpool' === $event->strAwayTeam);
    }

    /**
     * Next 15 events by league id (https://www.thesportsdb.com/api/v1/json/1/eventsnextleague.php?id=4328).
     *
     * @throws Exception
     */
    public function testLeagueNext(): void
    {
        $events = $this->client->schedule()->leagueNext(4328);
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

        $event = $events[0];
        $this->assertTrue('Liverpool' === $event->strHomeTeam || 'Liverpool' === $event->strAwayTeam);
    }

    /**
     * Last 15 events by league id (https://www.thesportsdb.com/api/v1/json/1/eventspastleague.php?id=4328).
     *
     * @throws Exception
     */
    public function testLeagueLast(): void
    {
        $events = $this->client->schedule()->leagueLast(4328);
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
