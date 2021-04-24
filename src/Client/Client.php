<?php

namespace NklKst\TheSportsDb\Client;

use NklKst\TheSportsDb\Client\Endpoint\HighlightEndpoint;
use NklKst\TheSportsDb\Client\Endpoint\ListEndpoint;
use NklKst\TheSportsDb\Client\Endpoint\LivescoreEndpoint;
use NklKst\TheSportsDb\Client\Endpoint\LookupEndpoint;
use NklKst\TheSportsDb\Client\Endpoint\ScheduleEndpoint;
use NklKst\TheSportsDb\Client\Endpoint\SearchEndpoint;
use NklKst\TheSportsDb\Config\Config;

/**
 * Client to get data.
 *
 * @author Nikolai Keist (github.com/nkl-kst)
 */
class Client
{
    private HighlightEndpoint $highlightEndpoint;
    private ListEndpoint $listEndpoint;
    private LivescoreEndpoint $livescoreEndpoint;
    private LookupEndpoint $lookupEndpoint;
    private ScheduleEndpoint $scheduleEndpoint;
    private SearchEndpoint $searchEndpoint;

    private Config $config;

    public function __construct(
        HighlightEndpoint $highlightEndpoint,
        ListEndpoint $listEndpoint,
        LivescoreEndpoint $livescoreEndpoint,
        LookupEndpoint $lookupEndpoint,
        ScheduleEndpoint $scheduleEndpoint,
        SearchEndpoint $searchEndpoint)
    {
        $this->highlightEndpoint = $highlightEndpoint;
        $this->listEndpoint = $listEndpoint;
        $this->livescoreEndpoint = $livescoreEndpoint;
        $this->lookupEndpoint = $lookupEndpoint;
        $this->scheduleEndpoint = $scheduleEndpoint;
        $this->searchEndpoint = $searchEndpoint;

        $this->config = new Config();
    }

    /**
     * Configure this client.
     *
     * @return Config Configuration
     */
    public function configure(): Config
    {
        return $this->config;
    }

    /**
     * Get highlights.
     *
     * @return HighlightEndpoint Highlight endpoints
     */
    public function highlight(): HighlightEndpoint
    {
        return $this->highlightEndpoint->setConfig($this->config);
    }

    /**
     * Get lists.
     *
     * @return ListEndpoint List endpoints
     */
    public function list(): ListEndpoint
    {
        return $this->listEndpoint->setConfig($this->config);
    }

    /**
     * Get livescores (v2).
     *
     * @return LivescoreEndpoint Livescore endpoints
     */
    public function livescore(): LivescoreEndpoint
    {
        return $this->livescoreEndpoint->setConfig($this->config);
    }

    /**
     * Lookup for data.
     *
     * @return LookupEndpoint Lookup endpoints
     */
    public function lookup(): LookupEndpoint
    {
        return $this->lookupEndpoint->setConfig($this->config);
    }

    /**
     * Get schedules.
     *
     * @return ScheduleEndpoint Schedule endpoints
     */
    public function schedule(): ScheduleEndpoint
    {
        return $this->scheduleEndpoint->setConfig($this->config);
    }

    /**
     * Search for data.
     *
     * @return SearchEndpoint Search endpoints
     */
    public function search(): SearchEndpoint
    {
        return $this->searchEndpoint->setConfig($this->config);
    }
}
