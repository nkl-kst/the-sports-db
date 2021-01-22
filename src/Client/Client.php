<?php

namespace NklKst\TheSportsDb\Client;

use NklKst\TheSportsDb\Client\Endpoint\HighlightEndpoint;
use NklKst\TheSportsDb\Client\Endpoint\ListEndpoint;
use NklKst\TheSportsDb\Client\Endpoint\LookupEndpoint;
use NklKst\TheSportsDb\Client\Endpoint\ScheduleEndpoint;
use NklKst\TheSportsDb\Client\Endpoint\SearchEndpoint;
use NklKst\TheSportsDb\Config\Config;

class Client
{
    private HighlightEndpoint $highlightEndpoint;
    private ListEndpoint $listEndpoint;
    private LookupEndpoint $lookupEndpoint;
    private ScheduleEndpoint $scheduleEndpoint;
    private SearchEndpoint $searchEndpoint;

    private Config $config;

    public function __construct(
        HighlightEndpoint $highlightEndpoint,
        ListEndpoint $listEndpoint,
        LookupEndpoint $lookupEndpoint,
        ScheduleEndpoint $scheduleEndpoint,
        SearchEndpoint $searchEndpoint)
    {
        $this->highlightEndpoint = $highlightEndpoint;
        $this->listEndpoint = $listEndpoint;
        $this->lookupEndpoint = $lookupEndpoint;
        $this->scheduleEndpoint = $scheduleEndpoint;
        $this->searchEndpoint = $searchEndpoint;

        $this->config = new Config();
    }

    public function configure(): Config
    {
        return $this->config;
    }

    public function highlight(): HighlightEndpoint
    {
        return $this->highlightEndpoint->setConfig($this->config);
    }

    public function list(): ListEndpoint
    {
        return $this->listEndpoint->setConfig($this->config);
    }

    public function lookup(): LookupEndpoint
    {
        return $this->lookupEndpoint->setConfig($this->config);
    }

    public function schedule(): ScheduleEndpoint
    {
        return $this->scheduleEndpoint->setConfig($this->config);
    }

    public function search(): SearchEndpoint
    {
        return $this->searchEndpoint->setConfig($this->config);
    }
}
